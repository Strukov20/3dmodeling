<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(Request $request){
        $query = $request->input('query');

        if (!$query) {
            return redirect()->route('home');
        }

        $materials = Material::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhere('body', 'LIKE', "%{$query}%")
            ->get();

        return view('search.results')->with('materials', $materials);
    }
}