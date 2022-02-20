<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';

    public function productos(){
        return $this->belongsTo('App\Models\Producto', 'codigo_producto_id');
    }
    public function vendedores(){
        return $this->belongsTo('App\Models\Vendedor', 'vendedor_id');
    }
    public function tiendas(){
        return $this->belongsTo('App\Models\Tienda', 'tienda_id');
    }

}
