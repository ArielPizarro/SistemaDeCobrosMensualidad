<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PagosModel;
use App\Models\AlumnosModel;
use App\Models\DetalleRolesPermisosModel; 



class Pagos extends BaseController
{
    protected $pagos,$alumnos,$detalleRoles;
    protected $reglas;


    public function __construct()
    {
        $this->pagos = new PagosModel();
        $this->alumnos = new AlumnosModel();
        $this->session = session();
        $this->detalleRoles = new DetalleRolesPermisosModel();
     

        helper(['form']);

        $this->reglas = [
            'monto' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

              
                ]
                ],
                'folio_boleta' => [
                    'rules' => 'required|is_unique[pagos.folio_boleta]',
                    'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'is_unique' => 'El campo {field} debe ser unico.'
    
                  
                    ]
                ]
        ];
    }

 


    public function index($activo = 1, $filtro = null)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }     
       
        $datos = $this->pagos->obtener(1);
        $data = ['titulo' => 'Pagos', 'datos' => $datos, 'filtro' => $filtro];

        echo view('header');
        echo view('pagos/pagos', $data);
        // echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }     
        $pagos = $this->pagos->obtener(0);
        $data = ['titulo' => 'Pagos eliminadas', 'datos' => $pagos];

        echo view('header');
        echo view('pagos/eliminados', $data);
        echo view('footer');
    }

    public function nuevo($idpagador)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }     
        
        $alumno = $this->alumnos->where('rutSinDiv', $idpagador)->first();
       
        $beneficio = $alumno['beneficio'];
        if($beneficio=="Prioritario")
            {$debe = 0;  }            
                else{
                        if($beneficio=="Preferente")
                {$debe = 275000; }else{
                        if($beneficio=="Hijo Funcionario")
                {$debe = 0; }else{
                    if($beneficio=="Pro-Retención")
                    {$debe = 275000; }else{
                        if($beneficio=="Sin Beneficio")
                        {$debe = 550000; }else{
                            if($beneficio=="Sin Verificar")
                            {$debe = 550000; }else{
                                if($beneficio=="Hermano")
                            {$debe = 467500; }
                            }
                        }
                    }
                }
                }
                }
                $multiplicafecha = date("m");
         $totalPagado = $this->pagos->totalPagosXalumno($idpagador);
        $data = ['titulo' => 'Agregar pago', 'alumno' => $alumno, 'debe' => $debe, 'totalPagado' => $totalPagado];

      


        echo view('header');
        echo view('pagos/nuevo', $data);
        echo view('footer');
    }
   

    public function insertar()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }     
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->pagos->save([
                'id_alumno' => $this->request->getPost('idalumno'),
                'forma_pago' => $this->request->getPost('forma_pago'),
                'ano_deuda' => $this->request->getPost('ano_deuda'),
                'folio_boleta' => $this->request->getPost('folio_boleta'),
                'fecha_pago' => $this->request->getPost('fecha_pago'),
                'monto' => $this->request->getPost('monto') * 1000,
                'comentario' => $this->request->getPost('comentario'),
                'razon_pago' => $this->request->getPost('razon_pago'),
                'id_usuario' => $this->session->id_usuario]);
                return redirect()->to(base_url() . '/pagos');
        } else {
           
            $data = ['titulo' => 'Agregar alumno', 'validation' => $this->validator];

            echo view('header');
            echo view('pagos/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }     
        $alumno = $this->pagos->where('id', $id)->first();
        $data = ['titulo' => 'Editar pago', 'alumno' => $alumno];
      


        echo view('header');
        echo view('pagos/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }     
        $this->pagos->update($this->request->getPost('id'), [
            'nombres' => $this->request->getPost('nombres'),
            'apellido_paterno' => $this->request->getPost('apellido_paterno'),
            'apellido_materno' => $this->request->getPost('apellido_materno'),
            'rut' => $this->request->getPost('rut'),
            'curso' => $this->request->getPost('curso'),
            'beneficio' => $this->request->getPost('beneficio')
        ]);


        return redirect()->to(base_url() . '/pagos');
    }

    public function eliminar($id)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }     
        $this->pagos->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/pagos');
    }

    public function reingresar($id)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }     
        $this->pagos->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/pagos');
    }

    public function autocompleteData(){
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }     
        $returnData = array();

        $valor = $this->request->getGet('term');

        $pagos = $this->pagos->like('nombre', $valor)->where('activo', 1)->findAll();
        if(!empty($pagos)){
            foreach($pagos as $row){
                $data['id'] = $row['id'];
                $data['value'] = $row['nombre'];
                array_push($returnData, $data);
            }
        }
        echo json_encode($returnData);
    }

 
}
