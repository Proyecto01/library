<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
    	'titulo',
        'autor_id',
        'cant_total',
        'disponibles',
    ];

    public function autor()
    {
        return $this->belongsTo('App\Autor');
    }

    public function socios()
    {
        return $this->belongsToMany('App\Socio', 'libros_socios', 'libro_id', 'socio_id');
    }

    public function updateStock()
    {
        $this->disponibles = $this->disponibles - 1;
        $this->save();
    }
}
