<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    public $timestamps = false;

    public function tiendas(){
        return $this->belongsTo('App\Models\Tienda', 'tienda_id');
    }
}
