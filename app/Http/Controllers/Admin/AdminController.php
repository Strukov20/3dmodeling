<?php

namespace App\Http\Controllers\Admin;

use App\Models\Material;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function getDashboard(){
        return view('admin.index');
    }

    public function getUsers(){
        $users = User::all();

        return view('admin.users')
            ->with(['users'=>$users]);
    }

    public function getMaterials(){
        $materials = Material::all();

        return view('admin.materials')
            ->with(['materials'=>$materials]);
    }


}
