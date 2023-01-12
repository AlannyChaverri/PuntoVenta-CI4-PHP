<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CajasModel;

class Cajas extends BaseController
{
    protected $cajas;
    protected $reglas;

    public function __construct()
    {
        // cargar el modelo
        $this->cajas = new CajasModel();
        helper(['form']);

        $this->reglas = [
            'nombre_caja' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo nombre de la caja es obligatorio.'
                ]
            ],
            'numero_caja' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de numero de caja es obligatorio.'
                ]
            ],
            'folio' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de folio es obligatorio.'
                ]
            ]
        ];
    }

    public function index($activo = 1)
    {
        // consulta para cajas activas
        $cajas = $this->cajas->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Cajas', 'datos' => $cajas];

        echo view('header');
        echo view('cajas/cajas', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $data = ['titulo' => 'Agregar caja'];

        echo view('header');
        echo view('cajas/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->cajas->save(
                [
                    'nombre_caja' => $this->request->getPost('nombre_caja'),
                    'numero_caja' => $this->request->getPost('numero_caja'),
                    'folio' => $this->request->getPost('folio')
                ]
            );

            return redirect()->to(base_url() . '/cajas');
        } else {

            $data = ['titulo' => 'Agregar caja', 'validation' => $this->validator];

            echo view('header');
            echo view('cajas/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id, $valid = null)
    {
        $caja = $this->cajas->where('id', $id)->first();

        if ($valid != null) {

            $data = ['titulo' => 'Editar caja', 'datos' => $caja, 'validation' => $valid];
        } else {

            $data = ['titulo' => 'Editar caja', 'datos' => $caja];
        }

        echo view('header');
        echo view('cajas/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->cajas->update(
                $this->request->getPost('id'),
                [
                    'nombre_caja' => $this->request->getPost('nombre_caja'),
                    'numero_caja' => $this->request->getPost('numero_caja'),
                    'folio' => $this->request->getPost('folio')
                ]
            );

            return redirect()->to(base_url() . '/cajas');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->cajas->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/cajas');
    }

    public function eliminados($activo = 0)
    {
        // consulta para cajas activas
        $cajas = $this->cajas->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Cajas eliminadas', 'datos' => $cajas];

        echo view('header');
        echo view('cajas/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->cajas->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/cajas');
    }
}
