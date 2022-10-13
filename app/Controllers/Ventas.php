<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VentasModel;
use App\Models\TemporalCompraModel;
use App\Models\DetalleVentaModel;
use App\Models\ProductosModel;
use App\Models\ConfiguracionModel;
use App\Models\CajasModel;

class Ventas extends BaseController
{
    protected $ventas, $temporal_compra, $detalle_venta, $productos, $configuracion, $cajas, $session;

    public function __construct()
    {
        $this->ventas = new VentasModel();
        $this->detalle_venta = new DetalleVentaModel();
        $this->productos = new ProductosModel();
        $this->configuracion = new ConfiguracionModel();
        $this->cajas = new CajasModel();
        $this->session = session();
        helper(['form']);
    }

    public function index($activo = 1)
    {
        if(!isset($this->session->id_usuario)) { return redirect()->to(base_url()); }
        $datos = $this->ventas->obtener(1);
        $data = ['titulo' => 'ventas', 'datos' => $datos];

        echo view('header');
        echo view('ventas/ventas', $data);
        echo view('footer');
    }
    public function eliminados($activo = 0)
    {
        $datos = $this->ventas->obtener(0);
        $data = ['titulo' => 'ventas eliminadas', 'datos' => $datos];

        echo view('header');
        echo view('ventas/eliminados', $data);
        echo view('footer');
    }
   

    public function venta()
    {


        echo view('header');
        echo view('ventas/caja');
        echo view('footer');
    }

    public function guarda()
    {
        $id_venta = $this->request->getPost('id_venta');
        $total = preg_replace('/[\$,]/', '', $this->request->getPost('total'));  //elimina ciertos caracteres establecidos
        $forma_pago = $this->request->getPost('forma_pago');
        $id_cliente = $this->request->getPost('id_cliente');

       

        $caja = $this->cajas->where('id', $this->session->id_caja)->first();
        $folio = $caja['folio'];

       

        $resultadoId = $this->ventas->insertaVenta($folio, $total, $this->session->id_usuario, $this->session->id_caja, $id_cliente, $forma_pago);

        $this->temporal_compra = new TemporalCompraModel();

        if ($resultadoId) {

            $folio++;
            $this->cajas->update($this->session->id_caja, ['folio' => $folio]);


            $resultadoCompra = $this->temporal_compra->porCompra($id_venta);

            foreach ($resultadoCompra as $row) {
                $this->detalle_venta->save([
                    'id_venta' => $resultadoId,
                    'id_producto' => $row['id_producto'],
                    'nombre' => $row['nombre'],
                    'cantidad' => $row['cantidad'],
                    'precio' => $row['precio']
                ]);
                $this->productos = new ProductosModel();
                $this->productos->actualizaStock($row['id_producto'], $row['cantidad'], '-');
            }
            $this->temporal_compra->eliminarCompra($id_venta);
        }

        return redirect()->to(base_url() . "/ventas/muestraTicket/" . $resultadoId);
    }
    function muestraTicket($id_venta)
    {
        $data['id_venta'] = $id_venta;
        echo view('header');
        echo view('ventas/ver_ticket', $data);
        echo view('footer');
    }

    function generaTicket($id_venta)
    {
        $datosVenta = $this->ventas->where('id', $id_venta)->first();
        $detalleVenta = $this->detalle_venta->select('*')->where('id_venta', $id_venta)->findAll();
        $nombreTienda = $this->configuracion->select('valor')->where('nombre', 'tienda_nombre')->get()->getRow()->valor;
        $direccionTienda = $this->configuracion->select('valor')->where('nombre', 'tienda_direccion')->get()->getRow()->valor;
        $leyendaTicket = $this->configuracion->select('valor')->where('nombre', 'ticket_leyenda')->get()->getRow()->valor;

        $pdf = new \FPDF('P', 'mm', array(80, 200));
        $pdf->AddPage();
        $pdf->SetMargins(5, 5, 5);
        $pdf->SetTitle("Venta");
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Cell(70, 5, $nombreTienda, 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 9);

        $pdf->image(base_url() . '/images/logo.png', 5, 1, 25, 20, 'PNG');
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(70, 5, utf8_decode($direccionTienda), 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(25, 5, utf8_decode('Fecha y hora: '), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(50, 5, $datosVenta['fecha_alta'], 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(15, 5, utf8_decode('Ticket: '), 0, 0, 'L');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(50, 5, $datosVenta['folio'], 0, 1, 'L');

        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 7);

        $pdf->Cell(7,  5, 'Cant', 0, 0, 'L');
        $pdf->Cell(35, 5, 'Nombre', 0, 0, 'L');
        $pdf->Cell(15, 5, 'Precio', 0, 0, 'L');
        $pdf->Cell(15, 5, 'Importe', 0, 1, 'L');

        $pdf->SetFont('Arial', '', 7);

        $contador = 1;
        foreach ($detalleVenta as $row) {
            $pdf->Cell(7, 5, $row['cantidad'], 0, 0, 'L');
            $pdf->Cell(35, 5, $row['nombre'], 0, 0, 'L');
            $pdf->Cell(15, 5, $row['precio'], 0, 0, 'L');
            $importe = number_format($row['precio'] * $row['cantidad'], 2, '.', ',');
            $pdf->Cell(15, 5, '$' . $importe, 0, 1, 'R');
            $contador++;
        }

        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 8);


        $pdf->Cell(70, 5, 'Total $' . number_format($datosVenta['total'], 2, '.', ','), 0, 1, 'R');

        $pdf->Ln();
        $pdf->Multicell(70, 4, $leyendaTicket, 0, 'C', 0);



        $this->response->setContentType('application/pdf'); //se reemplaza en vez de setHeader
        $pdf->Output("Ticket.pdf", "I");
    }
    public function eliminar($id)
    {
        $productos = $this->detalle_venta->where('id_venta', $id)->findAll();

        foreach ($productos as $producto) {
            $this->productos->actualizaStock($producto['id_producto'], $producto['cantidad'], '+');
        }
        $this->ventas->update($id, ['activo' => 0]);
        return redirect()->to(base_url(). '/ventas');
    }
}
