<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Material;
use Illuminate\Http\Request;

class CivilController extends Controller
{
    public function index(){
        $materials = Material::all();
        return view('CivilProject.index', ['materials' => $materials]);
    }

    public function create(){
        $materials = Material::all();
        return view('CivilProject.create', ['materials' => $materials]);
    }
    public function store(Request $request){

        $materials = new Material;

        $materials->nome = $request->nome;
        $materials->quantidade = $request->quantidade;
        $materials->marca = $request->marca;
        $materials->complemento = $request->complemento;
        $materials->type = $request->type;
        $materials->quantidadeoriginal = $request->quantidade;

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
        $materials = Material::where('id', $id)->first();

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
        Material::where('id', $id)->update($data);
        return redirect()->route('CivilProject-index')->with('msg', 'Item editado com sucesso!');
    }
    

    public function destroy($id){
        Material::where('id', $id)->delete();
        return redirect()->route('CivilProject-index');
    }

    public function send($id){
        $materials = Material::where('id', $id)->first();

        if(!empty($materials)){
            return view('CivilProject.send', ['materials' => $materials]);
        }else{
            return redirect()->route('CivilProject-index');
        }
    }

    public function applicants(){

        $applicants = Applicant::all();
        $materials = Material::all();


        return view('CivilProject.applicants', ['materials' => $materials, 'applicants' => $applicants]);
    }

    public function tools(){
        return view('CivilProject.tools');
    }

    public function materials(){
        return view('CivilProject.materials');
    }

    public function notfound(){
        return view('CivilProject.notfound');
    }

    public function info($id){
       $materials = material::findOrFail($id);

       return view('CivilProject.info', ['materials' => $materials]);
    }
        
}