<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RolesModel;
use App\Models\PermisosModel;
use App\Models\DetalleRolesPermisosModel;


class Roles extends BaseController
{
    protected $roles, $permisos, $detalleRoles;
    protected $reglas,  $session;

    public function __construct()
    {
        $this->roles = new RolesModel();
        $this->permisos = new PermisosModel();
        $this->detalleRoles = new DetalleRolesPermisosModel();
        $this->session = Session();
        helper(['form']);

        $this->reglas = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ],
            'nombre_corto' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }

        $roles = $this->roles->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Roles', 'datos' => $roles];

        echo view('header');
        echo view('roles/roles', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }

        $roles = $this->roles->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Roles eliminadas', 'datos' => $roles];

        echo view('header');
        echo view('roles/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }
        $data = ['titulo' => 'Agregar unidad'];

        echo view('header');
        echo view('roles/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->roles->save(['nombre' => $this->request->getPost('nombre'), 'nombre_corto' =>
            $this->request->getPost('nombre_corto')]);
            return redirect()->to(base_url() . '/roles');
        } else {
            $data = ['titulo' => 'Agregar unidad', 'validation' => $this->validator];

            echo view('header');
            echo view('roles/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }
        $unidad = $this->roles->where('id', $id)->first();


        if ($valid != null) {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad];
        }


        echo view('header');
        echo view('roles/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->roles->update($this->request->getPost('id'), ['nombre' =>
            $this->request->getPost('nombre'), 'nombre_corto' => $this->request->getPost('nombre_corto')]);
            return redirect()->to(base_url() . '/roles');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }
        $this->roles->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/roles');
    }

    public function reingresar($id)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }
        $this->roles->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/roles');
    }

    public function detalles($idRol)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }
        $permisos = $this->permisos->findAll();
        $permisosAsignados = $this->detalleRoles->where('id_rol', $idRol)->findAll();
        $datos = array();



        foreach ($permisosAsignados as $permisoAsignado) {
            $datos[$permisoAsignado['id_permiso']] = true;
        }

        $data = ['titulo' => 'Asignar permisos', 'permisos' => $permisos, 'id_rol' => $idRol, 'asignado' => $datos];

        echo view('header');
        echo view('roles/detalles', $data);
        echo view('footer');
    }

    public function guardaPermisos()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if (!$permiso) {                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }
        if ($this->request->getMethod() == "post") {

            $idRol = $this->request->getPost('id_rol');
            $permisos = $this->request->getPost('permisos');

            $this->detalleRoles->where('id_rol', $idRol)->delete();

            foreach ($permisos as $permiso) {
                $this->detalleRoles->save(['id_rol' => $idRol, 'id_permiso' => $permiso]);

                // print_r($_POST); //imprime el envio
            }
            return redirect()->to(base_url() . "/roles");
        }
    }
}
