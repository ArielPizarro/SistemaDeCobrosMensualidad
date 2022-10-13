<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CajasModel;
use App\Models\RolesModel;
use App\Models\LogsModel;
use App\Models\DetalleRolesPermisosModel; 

class Usuarios extends BaseController
{
    protected $usuarios, $cajas, $roles, $logs;
    protected $reglas, $reglasLogin, $reglasCambia, $detalleRoles, $session;  

    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->cajas = new CajasModel();
        $this->roles = new RolesModel();
        $this->logs = new LogsModel();
        $this->detalleRoles = new DetalleRolesPermisosModel();  //inicializamos el modelo
        $this->session = Session();
        
        helper(['form']);

        $this->reglas = [
            'usuario' => [
                'rules' => 'required|is_unique[usuarios.usuario]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El campo {field} debe ser unico.'

                ]
            ],
            'password' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]

            ],
            'repassword' =>  [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'Las contraseñas no coinciden'

                ]

            ],
            'nombre' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ],
            'id_caja' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ],
            'id_rol' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ]
        ];
        $this->reglasLogin = [
            'usuario' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ],
            'password' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ]
        ];


        $this->reglasCambia = [
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'

                ]
            ],
            'repassword' =>  [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'Las contraseñas no coinciden'

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

        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios];

        echo view('header');
        echo view('usuarios/usuarios', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }               

        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $data = ['titulo' => 'Usuarios eliminadas', 'datos' => $usuarios];

        echo view('header');
        echo view('usuarios/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }               

        $cajas = $this->cajas->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();
        $data = ['titulo' => 'Agregar usuario', 'cajas' => $cajas, 'roles' => $roles];

        echo view('header');
        echo view('usuarios/nuevo', $data);
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

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->save([
                'usuario' => $this->request->getPost('usuario'),
                'password' => $hash,
                'nombre' => $this->request->getPost('nombre'),
                'id_caja' => $this->request->getPost('id_caja'),
                'id_rol' => $this->request->getPost('id_rol'),
                'activo' => 1
            ]);




            return redirect()->to(base_url() . '/usuarios');
        } else {

            $cajas = $this->cajas->where('activo', 1)->findAll();
            $roles = $this->roles->where('activo', 1)->findAll();
            $data = [
                'titulo' => 'Agregar usuario', 'cajas' => $cajas, 'roles' => $roles,
                'validation' => $this->validator
            ];



            echo view('header');
            echo view('usuarios/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }               

        $unidad = $this->usuarios->where('id', $id)->first();


        if ($valid != null) {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad];
        }


        echo view('header');
        echo view('usuarios/editar', $data);
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
            $this->usuarios->update($this->request->getPost('id'), ['nombre' =>
            $this->request->getPost('nombre'), 'nombre_corto' => $this->request->getPost('nombre_corto')]);
            return redirect()->to(base_url() . '/usuarios');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }               

        $this->usuarios->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/usuarios');
    }

    public function reingresar($id)
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }               

        $this->usuarios->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/usuarios');
    }

    public function login()
    {
       echo view('login');
    }

    public function valida()
    {
      
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $datosUsuario = $this->usuarios->where('usuario', $usuario)->first();

            if ($datosUsuario != null) {
                if (password_verify($password, $datosUsuario['password'])) {
                    $datosSesion = [
                        'id_usuario' => $datosUsuario['id'],
                        'nombre' => $datosUsuario['nombre'],
                        'id_caja' => $datosUsuario['id_caja'],
                        'id_rol' => $datosUsuario['id_rol']
                    ];

                    $ip = $_SERVER['REMOTE_ADDR'];               //fragmento para registrar inicio de sesion en la tabla logs
                    $detalles = $_SERVER['HTTP_USER_AGENT'];

                    $this->logs->save([
                        'id_usuario' => $datosUsuario['id'],
                        'evento' => 'Inicio de sesión',
                        'ip' => $ip,
                        'detalles' => $detalles
                    ]);

                    $session = session();
                    $session->set($datosSesion);
                    return redirect()->to(base_url() . '/inicio');
                } else {
                    $data['error'] = "Las contraseñas no coinciden";
                    echo view('login', $data);
                }
            } else {
                $data['error'] = "El usuario no existe";
                echo view('login', $data);
            }
        } else {
            $data = ['validation' => $this->validator];
            echo view('login', $data);
        }
    }

    public function logout()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }               

        $session = session();

        
        $ip = $_SERVER['REMOTE_ADDR'];               //fragmento para registrar inicio de sesion en la tabla logs
        $detalles = $_SERVER['HTTP_USER_AGENT'];

        $this->logs->save([
            'id_usuario' => $session->id_usuario,
            'evento' => 'Cierre de sesión',
            'ip' => $ip,
            'detalles' => $detalles
        ]);

        $session->destroy(); //es igual que session_destroy
        return redirect()->to(base_url());
    }

    public function cambia_password()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }               

        $session = session();
        $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
        $data = ['titulo' => 'Cambiar Contraseña', 'usuario' => $usuario];

        echo view('header');
        echo view('usuarios/cambia_password', $data);
        echo view('footer');
    }
    public function actualizar_password()
    {
        $permiso =  $this->detalleRoles->verificaPermisos($this->session->id_rol, 'ProductosCatalogo');  //verifica roles
        if(!$permiso){                                                                                   //verifica roles
            echo 'No tienes permiso';                                                                    //verifica roles
            exit;                                                                                        //verifica roles
        }               

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasCambia)) {

            $session = session();
            $idUsuario = $session->id_usuario;

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->update($idUsuario, ['password' => $hash]);




            $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
            $data = ['titulo' => 'Cambiar Contraseña', 'usuario' => $usuario, 'mensaje' => 'Contraseña actualizada'];

            echo view('header');
            echo view('usuarios/cambia_password', $data);
            echo view('footer');
        } else {


            $session = session();
            $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
            $data = ['titulo' => 'Cambiar Contraseña', 'usuario' => $usuario, 'validation' => $this->validator];

            echo view('header');
            echo view('usuarios/cambia_password', $data);
            echo view('footer');
        }
    }
}
