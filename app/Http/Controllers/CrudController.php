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

        public function criar(){
            return view('criar');
        }

        public function criarA(Request $request){
            $dados = $request->only(['nome', 'email']);
            DB::insert('INSERT INTO CRUD (nome,email)VALUES (?,?)',[$dados['nome'], $dados['email']]);
            return redirect('/  ');

        }

        public function delet($id){
            DB::delete('DELETE FROM CRUD WHERE id=?',[$id]);
            return redirect('/');
        }
}
