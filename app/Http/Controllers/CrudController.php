<?php

namespace App\Http\Controllers;


use Highlight\Mode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ModelDB;

class CrudController extends Controller
{
    public function listar(){
        //$dados = DB::select('SELECT * FROM CRUD');
        $dados = ModelDB::all(); // eloquent
        return view('index', compact('dados'));

        }

        public function criar(){
            return view('criar');
        }

        public function criarA(Request $request){
            $dados = $request->only(['nome', 'email']);
           // DB::insert('INSERT INTO CRUD (nome,email)VALUES (?,?)',[$dados['nome'], $dados['email']]);

            ModelDB::insert($dados); //eloquent
            return redirect('/  ');

        }

        public function delet($id){
           // DB::delete('DELETE FROM CRUD WHERE id=?',[$id]);
            ModelDB::destroy($id); //eloquent
            return redirect('/');
        }

        public function editar($id){

                //$db = DB::select('SELECT * FROM crud WHERE id = ?', $id);
               $db = ModelDB::where('id', $id)->get();

               foreach ($db as $itens){
                   $nome = $itens->nome;
                   $email = $itens->email;
               }


            return view('editar', ['id' => $id, 'nome'=>$nome, 'email'=>$email]);

        }

        public function editarF(Request $request, $id){

            DB::update('UPDATE crud SET nome = ?, email = ? WHERE id = ? ', [$request['nome'], $request['email'], $id]);
            return redirect('/');
        }
}
