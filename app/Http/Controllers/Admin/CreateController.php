<?php

namespace App\Http\Controllers\Admin;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CreateController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreateMaterial(){
        return view('admin.create.material');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreateMaterial(Request $request){
        $validate = [
            'title' => 'max:50|required',
            'description' => 'max:200',
            'body' => 'max:1000|required',
        ];

        if (!empty($request->input('url'))){
            $validate['url'] = 'url';
        }

        $create = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'url' => $request->input('url'),
            'show' => !empty($request->input('show'))
        ];

        $this->validate($request, $validate);

        $material = Material::create($create);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            if (
                $image->getClientOriginalExtension() == "jpg" ||
                $image->getClientOriginalExtension() == "png" ||
                $image->getClientOriginalExtension() == "jpeg"
            ) {
                if ($material->image !== 'materials.png') {
                    $file = Storage::path('public/' . $material->image);

                    if (File::exists($file)) {
                        unlink($file);
                    }

                }

                $filename = Storage::put('public/images', $image);
                $material->update([
                    'image' => str_replace_first('public/','',$filename)
                ]);
            } else {
                return redirect()
                    ->back()
                    ->with('danger', 'Wrong file format.');
            }
        }

        return redirect()
            ->route('admin.edit.material', ['material_id' => $material->id])
            ->with(['success' => 'Material has been created.']);
    }

}
