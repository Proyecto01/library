<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    
    protected $fillable = [
    	'nombre',
        'apellido',
        'telefono',
        'prestados',
        'activo',
    ];

    public function libros()
    {
        return $this->belongsToMany('App\Libro', 'libros_socios',  'socio_id', 'libro_id');
    }
}
