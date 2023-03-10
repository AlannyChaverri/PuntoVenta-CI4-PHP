<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComprasModel;

class Compras extends BaseController
{
    protected $compras;
    protected $reglas;

    public function __construct()
    {
        // cargar el modelo
        $this->compras = new ComprasModel();
        helper(['form']);
    }

    public function index($activo = 1)
    {
        // consulta para compras activas
        $compras = $this->compras->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Compras', 'datos' => $compras];

        echo view('header');
        echo view('compras/compras', $data);
        echo view('footer');
    }

    public function nuevo()
    {

        echo view('header');
        echo view('compras/nuevo');
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->compras->save(
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'nombre_corto' => $this->request->getPost('nombre_corto')
                ]
            );

            return redirect()->to(base_url() . '/compras');
        } else {

            $data = ['titulo' => 'Agregar unidad', 'validation' => $this->validator];

            echo view('header');
            echo view('compras/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        $unidad = $this->compras->where('id', $id)->first();

        if ($valid != null) {

            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad, 'validation' => $valid];
        } else {

            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad];
        }

        echo view('header');
        echo view('compras/editar', $data);
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
        // return redirect()->to(base_url() . '/compras');

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->compras->update(
                $this->request->getPost('id'),
                [
                    'nombre' => $this->request->getPost('nombre'),
                    'nombre_corto' => $this->request->getPost('nombre_corto')
                ]
            );

            return redirect()->to(base_url() . '/compras');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->compras->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/compras');
    }

    public function eliminados($activo = 0)
    {
        // consulta para compras activas
        $compras = $this->compras->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Compras eliminadas', 'datos' => $compras];

        echo view('header');
        echo view('compras/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->compras->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/compras');
    }
}
