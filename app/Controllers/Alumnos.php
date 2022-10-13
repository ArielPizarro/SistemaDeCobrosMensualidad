<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumnosModel;
use App\Models\DetalleRolesPermisosModel;



class Alumnos extends BaseController
{
    protected $alumnos;
    protected $reglas, $detalleRoles, $session;


    public function __construct()
    {
        $this->alumnos = new AlumnosModel();

        $this->detalleRoles = new DetalleRolesPermisosModel();  //inicializamos el modelo
        $this->session = Session();


        helper(['form']);

        $this->reglas = [
            'nombres' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'


                ]
            ],
            'rut' => [
                'rules' => 'required|is_unique[alumnos.rut]|numeric',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El campo {field} debe ser unico.',
                    'numeric' => 'El Rut debe contener solo números'


                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }                  

        $alumnos = $this->alumnos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Alumnos', 'datos' => $alumnos];

        echo view('header');
        echo view('alumnos/alumnos', $data);
        echo view('footer');
    }

    public function indexAbono($activo = 1)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }                  

        $alumnos = $this->alumnos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Abonar a deuda', 'datos' => $alumnos];

        echo view('header');
        echo view('alumnos/alumnosAbono', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }                  

        $alumnos = $this->alumnos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Alumnos eliminadas', 'datos' => $alumnos];

        echo view('header');
        echo view('alumnos/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }                  

        $data = ['titulo' => 'Agregar alumno'];

        echo view('header');
        echo view('alumnos/nuevo', $data);
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
            $this->alumnos->save([
                'nombres' => $this->request->getPost('nombres'),
                'apellido_paterno' => $this->request->getPost('apellido_paterno'),
                'apellido_materno' => $this->request->getPost('apellido_materno'),
                'rut' => $this->request->getPost('rut'),
                'curso' => $this->request->getPost('curso'),
                'rutSinDiv' => substr($this->request->getPost('rut'), 0, -1) ,
                'beneficio' => $this->request->getPost('beneficio')]);
            return redirect()->to(base_url() . '/alumnos');
        } else {

            $data = ['titulo' => 'Agregar alumno', 'validation' => $this->validator];

            echo view('header');
            echo view('alumnos/nuevo', $data);
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

        $alumno = $this->alumnos->where('id', $id)->first();
        $data = ['titulo' => 'Editar alumno', 'alumno' => $alumno];



        echo view('header');
        echo view('alumnos/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }                  
        $this->alumnos->update($this->request->getPost('id'), [
            'nombres' => $this->request->getPost('nombres'),
            'apellido_paterno' => $this->request->getPost('apellido_paterno'),
            'apellido_materno' => $this->request->getPost('apellido_materno'),
            'rut' => $this->request->getPost('rut'),
            'curso' => $this->request->getPost('curso'),
            'beneficio' => $this->request->getPost('beneficio')
        ]);


        return redirect()->to(base_url() . '/alumnos');
    }

    public function eliminar($id)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }                  

        $this->alumnos->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/alumnos');
    }

    public function reingresar($id)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }                  

        $this->alumnos->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/alumnos');
    }

    public function autocompleteData()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }                  
        
        $returnData = array();

        $valor = $this->request->getGet('term');

        $alumnos = $this->alumnos->like('nombre', $valor)->where('activo', 1)->findAll();
        if (!empty($alumnos)) {
            foreach ($alumnos as $row) {
                $data['id'] = $row['id'];
                $data['value'] = $row['nombre'];
                array_push($returnData, $data);
            }
        }
        echo json_encode($returnData);
    }
}
