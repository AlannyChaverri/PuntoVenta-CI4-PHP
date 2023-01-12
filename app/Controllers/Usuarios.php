<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $usuarios;
    protected $reglas;

    public function __construct()
    {
        // cargar el modelo
        $this->usuarios = new UsuariosModel();
        helper(['form']);

        $this->reglas = [
            'usuario' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de usuario es obligatorio.'
                ]
            ],
            'password' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de password es obligatorio.'
                ]
            ],
            'id_caja' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de password es obligatorio.'
                ]
            ],
            'id_rol' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de password es obligatorio.'
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
        $data = ['titulo' => 'Agregar usuarios'];

        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->usuarios->save(
                [
                    'usuario' => $this->request->getPost('usuario'),
                    'password' => $this->request->getPost('password'),
                    'nombre' => $this->request->getPost('nombre'),
                    'id_caja' => $this->request->getPost('id_caja'),
                    'id_rol' => $this->request->getPost('id_rol')
                ]
            );

            return redirect()->to(base_url() . '/usuarios');
        } else {

            $data = ['titulo' => 'Agregar usuarios', 'validation' => $this->validator];

            echo view('header');
            echo view('usuarios/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        $usuarios = $this->usuarios->where('id', $id)->first();

        if ($valid != null) {

            $data = ['titulo' => 'Editar usuarios', 'datos' => $usuarios, 'validation' => $valid];
        } else {

            $data = ['titulo' => 'Editar usuarios', 'datos' => $usuarios];
        }

        echo view('header');
        echo view('usuarios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->usuarios->update(
                $this->request->getPost('id'),
                [
                    'usuario' => $this->request->getPost('usuario'),
                    'password' => $this->request->getPost('password'),
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

        $data = ['titulo' => 'Usuarios eliminadas', 'datos' => $usuarios];

        echo view('header');
        echo view('usuarios/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->usuarios->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/usuarios');
    }
}
