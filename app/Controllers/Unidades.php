<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnidadesModel;

class Unidades extends BaseController
{
    protected $unidades;
    protected $reglas;

    public function __construct()
    {
        // cargar el modelo
        $this->unidades = new UnidadesModel();
        helper(['form']);

        $this->reglas = [
            'nombre' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'nombre_corto' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de abreviatura es obligatorio.'
                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        // consulta para unidades activas
        $unidades = $this->unidades->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Unidades', 'datos' => $unidades];

        echo view('header');
        echo view('unidades/unidades', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $data = ['titulo' => 'Agregar unidad'];

        echo view('header');
        echo view('unidades/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->unidades->save(
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'nombre_corto' => $this->request->getPost('nombre_corto')
                ]
            );

            return redirect()->to(base_url() . '/unidades');
        } else {

            $data = ['titulo' => 'Agregar unidad', 'validation' => $this->validator];

            echo view('header');
            echo view('unidades/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        $unidad = $this->unidades->where('id', $id)->first();

        if ($valid != null) {

            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad, 'validation' => $valid];
        } else {

            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad];
        }

        echo view('header');
        echo view('unidades/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        // otra formade hacerlo
        // $Unidadesmodel = new UnidadesModel();
        // $datos = [
        //     'nombre' => $this->request->getVar('nombre'),
        //     'nombre_corto' => $this->request->getVar('nombre_corto'),
        // ];
        // $id = $this->request->getVar('id');
        // $Unidadesmodel->update($id, $datos);
        // return redirect()->to(base_url() . '/unidades');

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->unidades->update(
                $this->request->getPost('id'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'nombre_corto' => $this->request->getPost('nombre_corto')
                ]
            );

            return redirect()->to(base_url() . '/unidades');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->unidades->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/unidades');
    }

    public function eliminados($activo = 0)
    {
        // consulta para unidades activas
        $unidades = $this->unidades->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Unidades eliminadas', 'datos' => $unidades];

        echo view('header');
        echo view('unidades/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->unidades->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/unidades');
    }
}
