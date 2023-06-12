<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;

class AutorController extends Controller
{
    public function index()
    {
        
        return view('autores.index', [
            'autores' => Autor::latest()->paginate(10)
        ]);
    }

    public function create(Autor $autor) 
    {
        return view('autores.create', compact('autor'));
    }

    public function store(Request $request) 
    {
    	$request->validate([
    		'nombre'    => 'required',
    		'apellido'  => 'required',
    	]);
        
        $autor = new Autor;
        $autor->nombre  = $request->nombre;
        $autor->apellido  = $request->apellido;
        $autor->save();


        return redirect()->route('autores.edit', $autor);
    }

    public function edit(Autor $autore) 
    {

        return view('autores.edit', ['autor' => $autore]);
    }

    public function update(Request $request, Autor $autore)
    {
    	$request->validate([
    		'nombre'    => 'required',
    		'apellido'  => 'required',
    	]);

        $autore->update([
            'nombre'    => $request->nombre,
            'apellido'  => $request->apellido,
        ]);

        return redirect()->route('autores.edit', $autore);
    }

    public function destroy(Autor $autore) 
    {
        $autore->delete();

        return back();
    }
}
