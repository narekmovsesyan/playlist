<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editInfo(Request $request){

        $validatedData = $request->validate([
            'email' => 'nullable|email',
            'password' => 'confirmed',
        ]);


        $user = Auth::user();

        if (!is_null($request['name'])) {
            $user->name = $request['name'];
        }
        if (!is_null($request['email'])) {
            $user->email = $request['email'];
        }
        if (!is_null($request['password'])) {
            $user->password = bcrypt($request['password']);
        }


        if (!is_null($request['image'])) {

            if (!empty(Auth::user()->avatar)) {
                $image_path = public_path('images/avatars/'.Auth::user()->avatar);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $path = public_path('images/avatars/');
            $file_name = Auth::user()->id.'_'.time() . "_" . $request['image']->getClientOriginalName();
            $request['image']->move($path, $file_name);
            $user->avatar = $file_name;
        }

        $user->save();

        return redirect()->route('home');
    }
}
