<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;
use App\Models\DetalleRolesPermisosModel;

class Configuracion extends BaseController
{
    protected $configuracion;
    protected $reglas, $detalleRoles, $session;

    public function __construct()
    {

        helper(['form', 'upload']);

        $this->reglas = [
            'tienda_nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ],
            'tienda_rfc' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ]
        ];

        $this->configuracion = new ConfiguracionModel();
        $this->detalleRoles = new DetalleRolesPermisosModel();  //inicializamos el modelo
        $this->session = Session();
    }

    public function index($activo = 1)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }           


        $nombre = $this->configuracion->where('nombre', 'tienda_nombre')->first();
        $rfc = $this->configuracion->where('nombre', 'tienda_rfc')->first();
        $telefono = $this->configuracion->where('nombre', 'tienda_telefono')->first();
        $email = $this->configuracion->where('nombre', 'tienda_email')->first();
        $direccion = $this->configuracion->where('nombre', 'tienda_direccion')->first();
        $leyenda = $this->configuracion->where('nombre', 'ticket_leyenda')->first();
        $data = ['titulo' => 'Configuración', 'nombre' => $nombre, 'rfc' => $rfc, 'telefono' => $telefono, 'email' => $email, 'direccion' => $direccion, 'leyenda' => $leyenda];

        echo view('header');
        echo view('configuracion/configuracion', $data);
        echo view('footer');
    }

    public function editar($id, $valid = null)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }           
        $unidad = $this->configuracion->where('id', $id)->first();


        if ($valid != null) {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad];
        }


        echo view('header');
        echo view('configuracion/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }           
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->configuracion->whereIn('nombre', ['tienda_nombre'])->set(['valor' => $this->request->getPost('tienda_nombre')])->update();
            $this->configuracion->whereIn('nombre', ['tienda_rfc'])->set(['valor' => $this->request->getPost('tienda_rfc')])->update();
            $this->configuracion->whereIn('nombre', ['tienda_telefono'])->set(['valor' => $this->request->getPost('tienda_telefono')])->update();
            $this->configuracion->whereIn('nombre', ['tienda_email'])->set(['valor' => $this->request->getPost('tienda_email')])->update();
            $this->configuracion->whereIn('nombre', ['tienda_direccion'])->set(['valor' => $this->request->getPost('tienda_direccion')])->update();
            $this->configuracion->whereIn('nombre', ['ticket_leyenda'])->set(['valor' => $this->request->getPost('ticket_leyenda')])->update();



            $validacion = $this->request->getFile('tienda_logo');

            $validacion = $this->validate([
                'tienda_logo' => [
                    'uploaded[tienda_logo]',
                    'mime_in[tienda_logo,image/png]',
                    'max_size[tienda_logo, 4096]'
                ]
            ]);

            if ($validacion) {
                $ruta_logo = "images/logo.png";
                if (file_exists($ruta_logo)) {
                    unlink($ruta_logo);
                }

                $img = $this->request->getFile('tienda_logo');
                $img->move('./images', 'logo.png');
            } else {
                echo 'Error en la validacion';
                exit;
            }




            return redirect()->to(base_url() . '/configuracion');
        } else {
            //  return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }
}
