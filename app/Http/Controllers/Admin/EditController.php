<?php

namespace App\Http\Controllers\Admin;

use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    /**
     * Users
     */

    /**
     * @param $user_id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function getEditUser($user_id){
        $user = User::where(['id'=>$user_id])->first();

        if (!$user){
            return redirect()->back();
        }

        return view('admin.edit.user')->with(['user'=>$user]);
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditUser(Request $request, $user_id){
        $user = User::where(['id'=>$user_id])->first();

        if (!$user){
            return redirect()->back();
        }

        $validate = [
            'first_name' => 'alpha|max:50|required',
            'last_name' => 'alpha|max:50|required',
            'role' => 'alpha|max:10|required',
            'information' => 'max:200',
        ];

        $update = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'validate' => !empty($request->input('validate')),
        ];

        if (!empty($request->input('nickname')) || empty($user->nickname) ){
            $update['nickname'] = $request->input('nickname');
            $validate['nickname'] = 'unique:users|max:50';
        }

        if (!empty($request->input('email'))){
            $update['email'] = $request->input('email');
            $validate['email'] = 'email|unique:users|max:50';
        }

        if (!empty($request->input('date_of_birth'))){
            $update['date_of_birth'] = $request->input('date_of_birth');
            $validate['date_of_birth'] = 'date';
        }

        if (!empty($request->input('role'))){
            $update['role'] = $request->input('role');
        }

        if (!empty($request->input('information'))){
            $update['information'] = $request->input('information');
        }


        $this->validate($request, $validate);

        $user->update($update);

        return redirect()
            ->route('admin.edit.user', ['user_id' => $user_id])
            ->with(['success' => 'User profile has been updated.']);
    }

    /**
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteUser($user_id){
        $user = User::where(['id'=>$user_id])->first();

        if (!$user){
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('admin.users');
    }

    /**
     * Materials
     */

    /**
     * @param $material_id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function getEditMaterial($material_id){
        $material = Material::where(['id'=>$material_id])->first();

        if (!$material){
            return redirect()->back();
        }

        return view('admin.edit.material')->with(['material'=>$material]);
    }

    /**
     * @param Request $request
     * @param $material_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditMaterial(Request $request, $material_id){
        $material = Material::where(['id'=>$material_id])->first();

        if (!$material){
            return redirect()->back();
        }

        $validate = [
            'title' => 'max:50|required',
            'description' => 'max:200',
            'body' => 'max:1000|required',
        ];

        if (!empty($request->input('url'))){
            $validate['url'] = 'url';
        }

        $update = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'url' => $request->input('url'),
            'show' => !empty($request->input('show'))
        ];

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

        $this->validate($request, $validate);

        $material->update($update);

        return redirect()
            ->route('admin.edit.material', ['material_id' => $material_id])
            ->with(['success' => 'Material has been updated.']);
    }

    /**
     * @param $material_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeleteMaterial($material_id){
        $material = Material::where(['id'=>$material_id])->first();

        if (!$material){
            return redirect()->back();
        }

        $material->delete();

        return redirect()->route('admin.materials');
    }
}
