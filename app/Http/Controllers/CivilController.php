<?php

namespace App\Http\Controllers;

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
        material::create($request->all());
        return redirect()->route('CivilProject-index');
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
        return redirect()->route('CivilProject-index');
    }

    public function destroy($id){
        material::where('id', $id)->delete();
        return redirect()->route('CivilProject-index');
    }
}
