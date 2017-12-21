<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{

    public function getMaterial($materialId){
        $material = Material::where('id',$materialId)->first();

        return view('materials.index')->with('material',$material);
    }

}
