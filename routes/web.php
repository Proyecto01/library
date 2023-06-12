<?php
use Illuminate\Support\Facades\Route;
use App\Socio;

Route::get('/', function () {
    return view('socios.index', [
        'socios' => Socio::latest()->paginate(10)
    ]);
});

Route::resource('socios', SocioController::class);
Route::resource('autores', AutorController::class);
Route::resource('libros', LibroController::class);

Route::get('prestamos', 'LibroSocioController@index')->name('prestamos.index');
Route::get('prestamos/create', 'LibroSocioController@create')->name('prestamos.create');
Route::post('prestamos', 'LibroSocioController@store')->name('prestamos.store');
