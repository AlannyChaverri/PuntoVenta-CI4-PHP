<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CajasModel;
use App\Models\RolesModel;

class Usuarios extends BaseController
{
    protected $usuarios;
    protected $cajas;
    protected $roles;
    protected $reglas, $reglasLogin, $reglasCambioPass;

    public function __construct()
    {
        // cargar el modelo
        $this->usuarios = new UsuariosModel();
        $this->cajas = new CajasModel();
        $this->roles = new RolesModel();

        helper(['form']);

        $this->reglas = [
            'usuario' => [
                'rueles' => 'is_unique[usuarios_tb.usuario]',
                'errors' => [
                    'is_unique' => 'El usuario no es valido o ya existe.',
                ]
            ],
            'password' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de password es obligatorio.'
                ]
            ],
            'repassword' => [
                'rueles' => 'matches[password]',
                'errors' => [
                    'matches' => 'Los password no coinciden.'
                ]
            ],
            'id_caja' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de id caja es obligatorio.'
                ]
            ],
            'id_rol' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de id rol es obligatorio.'
                ]
            ]
        ];

        $this->reglasLogin = [
            'usuario' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El usuario es obligatorio.',
                ]
            ],
            'password' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El password es obligatorio.'
                ]
            ]
        ];

        $this->reglasCambioPass = [
            'password' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de password es obligatorio.'
                ]
            ],
            'repassword' => [
                'rueles' => 'matches[password]',
                'errors' => [
                    'matches' => 'Los password no coinciden.'
                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        // consulta para usuarios activas
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios];

        echo view('header');
        echo view('usuarios/usuarios', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $cajas = $this->cajas->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();

        $data = ['titulo' => 'Agregar usuarios', 'cajas' => $cajas, 'roles' => $roles];

        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->save(
                [
                    'usuario' => $this->request->getPost('usuario'),
                    'password' => $hash,
                    'nombre' => $this->request->getPost('nombre'),
                    'id_caja' => $this->request->getPost('id_caja'),
                    'id_rol' => $this->request->getPost('id_rol')
                ]
            );

            return redirect()->to(base_url() . '/usuarios');
        } else {

            $cajas = $this->cajas->where('activo', 1)->findAll();
            $roles = $this->roles->where('activo', 1)->findAll();

            $data = ['titulo' => 'Agregar usuarios', 'cajas' => $cajas, 'roles' => $roles, 'validation' => $this->validator];

            echo view('header');
            echo view('usuarios/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        $cajas = $this->cajas->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();
        $usuarios = $this->usuarios->where('id', $id)->first();

        $data = ['titulo' => 'Editar producto', 'cajas' => $cajas, 'roles' => $roles, 'usuarios' => $usuarios, 'validation' => $this->validator];

        echo view('header');
        echo view('usuarios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $this->usuarios->update(
                $this->request->getPost('id'),
                [
                    'usuario' => $this->request->getPost('usuario'),
                    'password' => $hash,
                    'nombre' => $this->request->getPost('nombre'),
                    'id_caja' => $this->request->getPost('id_caja'),
                    'id_rol' => $this->request->getPost('id_rol')
                ]
            );

            return redirect()->to(base_url() . '/usuarios');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->usuarios->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/usuarios');
    }

    public function eliminados($activo = 0)
    {
        // consulta para usuarios activas
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Usuarios eliminados', 'datos' => $usuarios];

        echo view('header');
        echo view('usuarios/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
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

            $usuarios = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $datosUsuario = $this->usuarios->where('usuario', $usuarios)->first();

            if ($datosUsuario != null) {

                if (password_verify($password, $datosUsuario['password'])) {
                    $datosSesion = [

                        'id_usuario' => $datosUsuario['id'],
                        'nombre' => $datosUsuario['nombre'],
                        'id_caja' => $datosUsuario['id_caja'],
                        'id_rol' => $datosUsuario['id_rol'],
                    ];

                    $session = session();
                    $session->set($datosSesion);

                    return redirect()->to(base_url() . '/configuracion');
                } else {
                    $data['error'] = "Error al autentificar";
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
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }

    public function cambia_password()
    {
        $session = session();
        $usuario = $this->usuarios->where('id', $session->id_usuario)->first();

        $data = ['titulo' => 'Cambiar password', 'usuarios' => $usuario];

        echo view('header');
        echo view('usuarios/cambia_password', $data);
        echo view('footer');
    }

    public function actualizar_password()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasCambioPass)) {

            $session = session();
            $idUser = $session->id_usuario;

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->update(
                $idUser,
                [
                    'password' => $hash
                ]

            );

            $usuario = $this->usuarios->where('id', $session->id_usuario)->first();

            $data = ['titulo' => 'Cambiar password', 'usuarios' => $usuario, 'mensaje' => 'Password actualizado'];

            echo view('header');
            echo view('usuarios/cambia_password', $data);
            echo view('footer');
        } else {

            $session = session();
            $usuario = $this->usuarios->where('id', $session->id_usuario)->first();

            $data = ['titulo' => 'Cambiar password', 'usuarios' => $usuario, 'validation' => $this->validator];

            echo view('header');
            echo view('usuarios/cambia_password', $data);
            echo view('footer');
        }
    }
}
