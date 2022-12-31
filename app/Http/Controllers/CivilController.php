<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Material;
use Illuminate\Http\Request;

class CivilController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){
            
            $materials = Material::where([

            ['nome', 'like', '%'.$search.'%']

            ])->get();

        }else{
            $materials = Material::all();
        }
        
        return view('CivilProject.index', ['materials' => $materials, 'search' => $search]);
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

        $searchapplicants = request('searchapplicants');

        if($searchapplicants){
            
            $applicants = Applicant::where([

            ['created_at', 'like', '%'.$searchapplicants.'%']

            ])->get();

        }else{
            $applicants = Applicant::all();
        }

        return view('CivilProject.applicants', ['applicants' => $applicants, 'searchapplicants' => $searchapplicants]);
    }

    public function info($id){
       $materials = material::findOrFail($id);

       return view('CivilProject.info', ['materials' => $materials]);
    }

    public function select(){
        $searchselect = request('searchselect');

        if($searchselect){
            
            $materials = Material::where([

            ['nome', 'like', '%'.$searchselect.'%']

            ])->get();

        }else{
            $materials = Material::all();
        }
        
        return view('CivilProject.select', ['materials' => $materials, 'search' => $searchselect]);
    }


    public function extra(){
        return view('CivilProject.extra');
    }




    public function notfound(){
        return view('CivilProject.notfound');
    }
        
}