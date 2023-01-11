<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\ExtraHour;
use App\Models\Material;
use GrahamCampbell\ResultType\Success;
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
            $materials = Material::all()->sortByDesc('created_at');
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
        return redirect()->route('CivilProject-create')->withSuccessMessage('Item Adicionado ao Estoque!');
    }

    public function extrastore(Request $request){
        $extrahours = new ExtraHour;
        $extrahours->funcionario = $request->funcionario;
        $extrahours->entrada = $request->entrada;
        $extrahours->saida = $request->saida;

        $extrahours->save();
        return redirect()->route('CivilProject-extra')->withSuccessMessage('Hora Extra Contabilizada!');
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
        return redirect()->route('CivilProject-index')->withSuccessMessage('Item editado com sucesso!');
    }
    

 
    public function SoftDeleteAndForceDelete($id){
        $materials = Material::withTrashed()->findOrFail($id);
        if($materials->deleted_at == null){
            $materials->delete();
          }
        else {
            $materials->forceDelete();
        }
          return response()->json(['status' => 'item Deleted Successfully!']);
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
            return redirect()->route('CivilProject-index')->withSuccessMessage('Novo Registro de Solicitação Adicionado!'); 

        }catch(\Exception $exception){
            return  redirect()->route('CivilProject-index')->withErrorMessage('Algo deu Errado, Registro de Solicitação não concluido.');
        }      
    }

    public function applicants(){
        $applicants = Applicant::all();
        return view('CivilProject.applicants', ['applicants' => $applicants]);
    }

    public function info($id){
       $materials = material::findOrFail($id);
       return view('CivilProject.info', ['materials' => $materials]);
    }

    public function select(){
        $materials = Material::all();
        return view('CivilProject.select', compact('materials'));
    }


    public function extra(){
        $extra = ExtraHour::all();
        return view('CivilProject.extra', ['extra' => $extra]);
    }

    public function query(){
        $materials = Material::onlyTrashed()->get();
        return view('CivilProject.query', ['materials' => $materials]);
    }

    public function notfound(){
        return view('notfound');
    }

    public function return($id){
        $materials = new Material;
        $applicants = Applicant::where('id', $id)->first();
        return view('CivilProject.return', ['materials' => $materials, 'applicants' => $applicants]);
    }

    public function updateRequest(Request $request, $id){
        $data = [
            'nome' => $request->nome,
            'quantidade' => $request->quantidade_solicitada,
            'funcionario' => $request->funcionario,
            'observacoes' => $request->observacoes,
            'marca' => $request->marca,
            'devolvido' => $request->devolvido,
            'mais_observacoes' => $request->mais_observacoes,
            'data_devolucao' => $request->data_devolucao 
        ];
        Applicant::where('id', $id)->update($data);
        return redirect()->route('CivilProject-applicants')->withSuccessMessage('Registro Atualizado com sucesso!');
    }
        
}