<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\material;
use Illuminate\Http\Request;

class CivilController extends Controller
{
    public function index(){
        $materials = material::all();
         return view('CivilProject.index', ['materials' => $materials]);
    }

    public function create(){
        return view('CivilProject.create');
    }
    public function store(Request $request){

        $materials = new material;

        $materials->nome = $request->nome;
        $materials->quantidade = $request->quantidade;
        $materials->marca = $request->marca;
        $materials->complemento = $request->complemento;
        $materials->type = $request->type;

        $materials->save();
        return redirect()->route('CivilProject-index')->with('msg', 'Item adicionado ao estoque!');
    }

    public function sendstore(Request $request){

        $applicants = new Applicant;

        $applicants->nome = $request->nome;
        $applicants->marca = $request->marca;
        $applicants->funcionario = $request->funcionario;
        $applicants->quantidade = $request->quantidade_solicitada;
        $applicants->observacoes = $request->observacoes;

        $applicants->materials_id = $request->id;

        $applicants->save();
        return redirect()->route('CivilProject-index')->with('msg', 'Registro Adicionado!');
    }


    public function edit($id){
        $materials = material::where('id', $id)->first();

        if(!empty($materials)){
            return view('CivilProject.edit', ['materials' => $materials]);
        }else{
            return redirect()->route('CivilProject-index');
        }
    }
    public function update(Request $request, $id){
        $data = [
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'marca' => $request->marca,
            'complemento' => $request->complemento
        ];
        material::where('id', $id)->update($data);
        return redirect()->route('CivilProject-index')->with('msg', 'Item editado com sucesso!');
    }
    

    public function destroy($id){
        material::where('id', $id)->delete();
        return redirect()->route('CivilProject-index');
    }

    public function send($id){
        $materials = material::where('id', $id)->first();

        if(!empty($materials)){
            return view('CivilProject.send', ['materials' => $materials]);
        }else{
            return redirect()->route('CivilProject-index');
        }
    }

    public function applicants(){

        $applicants = Applicant::all();
        $materials = material::all();


        return view('CivilProject.applicants', ['materials' => $materials, 'applicants' => $applicants]);
    }
    
}
