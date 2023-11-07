<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PENDIENTE=1;
    const RECIBIDO=2;
    const ENVIADO=3;
    const ENTREGADO=4;
    const ANULADO=5;

    const TIENDA=1;
    const DOMICILIO=2;
    

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
