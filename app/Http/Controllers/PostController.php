<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user){
        
        return view('dashboard',[
            'user' => $user
        ]);
    }

    /**
     * Retorna una vista
     * @return mixed
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Guarda en base de datos
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo'      => 'required|max:255',
            'descripcion' => 'required',
            'imagen'      => 'required'  
        ]);

        Post::create([
            'titulo'      => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen'      => $request->imagen,
            'user_id'     => auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
