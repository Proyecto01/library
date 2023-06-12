<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Socio;

class SocioController extends Controller
{
    public function index()
    {
        
        return view('socios.index', [
            'socios' => Socio::latest()->paginate(10)
        ]);
    }

    public function create(Socio $socio)
    {
        return view('socios.create', compact('socio'));
    }

    public function store(Request $request) 
    {
    	$request->validate([
    		'nombre'    => 'required',
    		'apellido'  => 'required',
    		'telefono'  => 'required',
    	]);
        
        $socio = new Socio;
        $socio->nombre  = $request->nombre;
        $socio->apellido  = $request->apellido;
        $socio->telefono  = $request->telefono;
        $socio->prestados = $request->prestados;
        $socio->activo    = $request->activo;
        $socio->save();


        return redirect()->route('socios.edit', $socio);
    }

    public function edit(Socio $socio) 
    {
        return view('socios.edit', compact('socio'));
    }

    public function update(Request $request, Socio $socio)
    {
    	$request->validate([
    		'nombre'    => 'required',
    		'apellido'  => 'required',
    		'telefono'  => 'required',
    	]);

        $socio->update([
            'nombre'    => $request->nombre,
            'apellido'  => $request->apellido,
            'telefono'  => $request->telefono,
            'prestados' => $request->prestados,
            'activo'    => $request->activo,
        ]);

        return redirect()->route('socios.edit', $socio);
    }

    public function destroy(Socio $socio) 
    {
        $socio->delete();

        return back();
    }

}
