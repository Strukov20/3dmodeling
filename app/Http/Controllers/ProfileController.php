<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function getProfile($user_id = null){
        /*$user = User::where('id', $user_id)->first();

        if (!$user){
            abort(404);
        }*/
        $user = Auth::user();

        return view('profile.index')
            ->with('user', $user);
    }

    public function getEdit(){
        return view('profile.edit');
    }

    public function postEdit(Request $request){
        $validate = [
            'first_name' => 'alpha|max:50|required',
            'last_name' => 'alpha|max:50|required',
            'information' => 'max:200',
        ];

        $update = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
        ];

        if (!empty($request->input('nickname')) || empty(Auth::user()->nickname)){
            $update['nickname'] = $request->input('nickname');
            $validate['nickname'] = 'unique:users|max:50';
        }

        if (!empty($request->input('date_of_birth'))){
            $update['date_of_birth'] = $request->input('date_of_birth');
            $validate['date_of_birth'] = 'date';
        }

        if (!empty($request->input('information'))){
            $update['information'] = $request->input('information');
        }


        $this->validate($request, $validate);

        if($request->hasFile('avatar')) {
            $user = Auth::user();
            $avatar = $request->file('avatar');
            if (
                $avatar->getClientOriginalExtension() == "jpg" ||
                $avatar->getClientOriginalExtension() == "png" ||
                $avatar->getClientOriginalExtension() == "jpeg"
            ) {
                if ($user->avatar !== 'default.jpeg') {
                    $file = Storage::path('public/' . $user->avatar);

                    if (File::exists($file)) {
                        unlink($file);
                    }

                }

                $filename = Storage::put('public/avatar', $avatar);
                Auth::user()->update([
                    'avatar' => str_replace_first('public/','',$filename)
                ]);
            } else {
                return redirect()
                    ->back()
                    ->with('danger', 'Wrong file format.');
            }
        }

        Auth::user()->update($update);

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Your profile has been updated.');
    }

    public function postEditPass(Request $request){
        $user = Auth::user();

        Validator::extend('old_password', function($attribute, $value) use ($user) {
            return Hash::check( $value, $user->password );
        },'Wrong password!');

        $this->validate($request, [
            'old_password' => 'required|min:6|max:32|old_password',
            'password' => 'required|min:6|max:32|confirmed',
            'password_confirmation' => 'required|min:6|max:32'
        ]);

        Auth::user()->update([
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Your profile has been updated.');
    }

}
