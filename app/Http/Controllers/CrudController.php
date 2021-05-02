<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function listar(){
        $dados = DB::select('SELECT * FROM CRUD');
        return view('index', compact('dados'));

        }
}
