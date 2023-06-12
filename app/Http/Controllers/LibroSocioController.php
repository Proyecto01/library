<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Socio;
use App\Libro;
use App\LibroSocio;

class LibroSocioController extends Controller
{
    public function index()
    {
        return view('librosSocios.index', [
            'librosSocios' => LibroSocio::latest()->paginate(10)
        ]);
    }

    public function create() 
    {
        $libros = Libro::all();
        $socios = Socio::where('activo', 1)->get();
        return view('librosSocios.create', ['libros' => $libros, 'socios' => $socios]);
    }

    public function store(Request $request) 
    {
    	$request->validate([
    		'socio_id'    => 'required',
    		'libro_id'  => 'required',
    	]);

        $libro = Libro::find($request->libro_id);
        $socio = Socio::find($request->socio_id);
        if ($libro->disponibles > 0 && ($socio->prestados == 0 || $socio->prestados > $socio->libros()->count()))
        {
            $libro->socios()->attach($request->socio_id);
            $libro->updateStock();
        }

        return redirect()->route('prestamos.index');
    }
}
