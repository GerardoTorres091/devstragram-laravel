<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
        # acceder a las propiedades de $request
        # $request->get('username');

        #modificar el request, ultima opción
        $request->request->add(['username' => Str::slug($request->username)]);

        # validation
        $this->validate($request, [
            'name'     => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email'    => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        //usando el modelo User que ya nos proporciona laravel
        //usando creat para crear el registro en la bd
        //ya viene incluida la clase Hash para hashear pass
        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //redireccionar
        return redirect()->route('posts.index');
    }
}
