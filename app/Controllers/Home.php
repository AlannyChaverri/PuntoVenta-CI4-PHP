<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('tables1');
        // echo view('contenido');
        echo view('footer');
    }
}
