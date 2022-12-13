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
}
