<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        if (Auth::check()){
            $materials = Material::where('show',true)->get();
            return view('index')->with('materials',$materials);
        }
        return view('auth.signin');
    }

}
