<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    public function tiposProductos(){
        return $this->belongsTo('App\Models\TipoRopa', 'tipo_producto_id');
    }
    public function marcas(){
        return $this->belongsTo('App\Models\Marca', 'marca_id');
    }



}
