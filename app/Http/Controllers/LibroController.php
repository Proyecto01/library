<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\Autor;

class LibroController extends Controller
{
    public function index()
    {
        
        return view('libros.index', [
            'libros' => Libro::latest()->paginate(10)
        ]);
    }

    public function create(Libro $libro) 
    {
        $autores = Autor::get();
        return view('libros.create', ['libro' => $libro, 'autores' => $autores]);
    }

    public function store(Request $request) 
    {
    	$request->validate([
    		'titulo'    => 'required',
    		'autor_id'  => 'required',
    		'cant_total'  => 'required',
            'disponibles'  => 'required',
    	]);
        
        $libro = new Libro;
        $libro->titulo  = $request->titulo;
        $libro->autor_id  = $request->autor_id;
        $libro->cant_total  = $request->cant_total;
        $libro->disponibles = $request->disponibles;
        $libro->save();


        return redirect()->route('libros.edit', $libro);
    }

    public function edit(Libro $libro) 
    {
        $autores = Autor::get();
        return view('libros.edit', ['libro' => $libro, 'autores' => $autores]);
    }

    public function update(Request $request, Libro $libro)
    {
    	$request->validate([
    		'titulo'    => 'required',
    		'autor_id'  => 'required',
    		'cant_total'  => 'required',
            'disponibles'  => 'required',
    	]);

        $libro->update([
            'titulo'    => $request->titulo,
            'autor_id'  => $request->autor_id,
            'cant_total'  => $request->cant_total,
            'disponibles' => $request->disponibles,
        ]);

        return redirect()->route('libros.edit', $libro);
    }

    public function destroy(Libro $libro) 
    {
        $libro->delete();

        return back();
    }
}
