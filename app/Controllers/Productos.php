<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\UnidadesModel;
use App\Models\CategoriasModel;

class Productos extends BaseController
{
    protected $productos;
    protected $unidades;
    protected $categorias;
    protected $reglas;

    public function __construct()
    {
        // cargar el modelo
        $this->productos = new ProductosModel();
        $this->unidades = new UnidadesModel();
        $this->categorias = new CategoriasModel();

        helper(['form']);

        $this->reglas = [
            'codigo' => [
                // 'rueles' => 'required|is_unique[productos_tb.codigo]',
                'rueles' => 'is_unique[productos_tb.codigo]',
                'errors' => [
                    'is_unique' => 'El codigo no es valido o ya existe.',

                    'required' => 'El campo de nombre es obligatorio.'
                ]
            ],
            'nombre' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de nombre es obligatorio.'
                ]
            ],
            'precio_venta' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de precio de venta es obligatorio.'
                ]
            ],
            'precio_compra' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de precio de compra es obligatorio.'
                ]
            ],
            'precio_compra' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de precio de compra es obligatorio.'
                ]
            ],
            'stock_minimo' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de stock minimo es obligatorio.'
                ]
            ],
            'inventariable' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de inventariable es obligatorio.'
                ]
            ],
            'id_unidad' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de unidad es obligatorio.'
                ]
            ],
            'id_categoria' => [
                'rueles' => 'required',
                'errors' => [
                    'required' => 'El campo de categoria es obligatorio.'
                ]
            ],
        ];
    }

    public function index($activo = 1)
    {
        // consulta para productos activas
        $productos = $this->productos->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Productos', 'datos' => $productos];

        echo view('header');
        echo view('productos/productos', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $categorias = $this->categorias->where('activo', 1)->findAll();
        $unidades = $this->unidades->where('activo', 1)->findAll();

        $data = ['titulo' => 'Agregar producto', 'unidades' => $unidades, 'categorias' => $categorias];

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->productos->save(
                [
                    'codigo' => $this->request->getPost('codigo'),
                    'nombre' => $this->request->getPost('nombre'),
                    'precio_venta' => $this->request->getPost('precio_venta'),
                    'precio_compra' => $this->request->getPost('precio_compra'),
                    'stock_minimo' => $this->request->getPost('stock_minimo'),
                    'inventariable' => $this->request->getPost('inventariable'),
                    'id_unidad' => $this->request->getPost('id_unidad'),
                    'id_categoria' => $this->request->getPost('id_categoria')
                ]
            );

            return redirect()->to(base_url() . '/productos');
        } else {
            $categorias = $this->categorias->where('activo', 1)->findAll();
            $unidades = $this->unidades->where('activo', 1)->findAll();

            $data = ['titulo' => 'Agregar producto', 'unidades' => $unidades, 'categorias' => $categorias, 'validation' => $this->validator];

            echo view('header');
            echo view('productos/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id)
    {

        $categorias = $this->categorias->where('activo', 1)->findAll();
        $unidades = $this->unidades->where('activo', 1)->findAll();
        $producto = $this->productos->where('id', $id)->first();

        $data = ['titulo' => 'Editar producto', 'unidades' => $unidades, 'categorias' => $categorias, 'producto' => $producto];


        echo view('header');
        echo view('productos/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        $this->productos->update(
            $this->request->getPost('id'),
            [
                'codigo' => $this->request->getPost('codigo'),
                'nombre' => $this->request->getPost('nombre'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_compra' => $this->request->getPost('precio_compra'),
                'stock_minimo' => $this->request->getPost('stock_minimo'),
                'inventariable' => $this->request->getPost('inventariable'),
                'id_unidad' => $this->request->getPost('id_unidad'),
                'id_categoria' => $this->request->getPost('id_categoria')
            ]
        );

        return redirect()->to(base_url() . '/productos');
    }

    public function eliminar($id)
    {
        $this->productos->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/productos');
    }

    public function eliminados($activo = 0)
    {
        // consulta para productos activas
        $productos = $this->productos->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Productos eliminados', 'datos' => $productos];

        echo view('header');
        echo view('productos/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id)
    {
        $this->productos->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/productos');
    }

    public function buscarPorCodigo($codigo)
    {
        $this->productos->select('*');
        $this->productos->where('codigo', $codigo);
        $this->productos->where('activo', 1);
        $datos = $this->productos->get()->getRow();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';

        if ($datos) {
            $res['datos'] = $datos;
            $res['existe'] = true;
        } else {
            $res['error'] = 'No existeste el producto';
            $res['existe'] = false;
        }
        echo json_encode($res);
    }
}
