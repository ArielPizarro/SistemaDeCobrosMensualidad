<?php

namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\VentasModel;
use App\Models\PagosModel;
use App\Models\DetalleRolesPermisosModel;

class Inicio extends BaseController
{
    protected $productoModel, $ventasModel, $session, $detalleRoles, $pagosModel;

    public function __construct()
    {
        $this->productoModel = new ProductosModel();
        $this->ventasModel = new VentasModel();
        $this->session = session();
        $this->pagosModel = new PagosModel();
        $this->detalleRoles = new DetalleRolesPermisosModel();
    }

    public function index()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }                     
        
        if(!isset($this->session->id_usuario)) { return redirect()->to(base_url()); }
        $total = $this->productoModel->totalProductos();
        $minimos = $this->productoModel->productosMinimo();
        $hoy = date('y-m-d');
        $totalVentas = $this->ventasModel->totalDia($hoy);
        $totalMes = $this->pagosModel->totalMes($hoy);
        $totalDia = $this->pagosModel->totalDia($hoy);
        $totalPagos = $this->pagosModel->totalPagos();
        $totalPagosMensualidad = $this->pagosModel->obtenerTotalPagadoMensualidad();
        
        $datos = ['total' => $total, 'totalVentas' => $totalVentas, 'minimos' => $minimos, 'totalMes' => $totalMes, 'totalDia' => $totalDia, 'totalPagos' => $totalPagos, 'totalPagosMensualidad' => $totalPagosMensualidad];

        echo view('header');
        echo view('inicio', $datos);
        echo view('footer');
    }


}
