<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Material;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\InvalidData;

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

    public function forceRemove($id){
        Material::where('id', $id)->forcedelete();
        return redirect()->route('CivilProject-query');
    }

    public function send($id){
        $materials = Material::where('id', $id)->firstOrFail();

        if(!empty($materials)){
            return view('CivilProject.send', ['materials' => $materials]);
        }else{
            return redirect()->route('CivilProject-index');
        }
    }

    public function sendstore(Request $request){

        try{
            $applicants = new Applicant;
            $applicants->nome = $request->nome;
            $applicants->marca = $request->marca;
            $applicants->funcionario = $request->funcionario;
            $applicants->quantidade = $request->quantidade_solicitada;
            $applicants->observacoes = $request->observacoes;
            $applicants->materials_id = $request->id;
            
            $applicants->save();
            return redirect()->route('CivilProject-index')->with('msg', 'Registro Adicionado!');   

        }catch(\Exception $exception){
            return  redirect()->route('CivilProject-index')->with('msgerror', '[Erro] Registro não adicionado!');
        }     
    }

    public function applicants(){

        $searchapplicants = request('searchapplicants');

        if($searchapplicants){
            
            $applicants = Applicant::where([

            ['funcionario', 'like', '%'.$searchapplicants.'%']

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

    public function query(){
        $searchquery = request('searchquery');

        if($searchquery){
            
            $materials = Material::where([

            ['nome', 'like', '%'.$searchquery.'%']

            ])->get();

        }else{
            $materials = Material::onlyTrashed()->get();
        }
        
        return view('CivilProject.query', ['materials' => $materials, 'searchquery' => $searchquery]);
    }


    public function notfound(){
        return view('notfound');
    }
        
}