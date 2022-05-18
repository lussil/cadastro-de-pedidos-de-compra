<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produto()
    {
        return $this->belongsToMany(Produto::class, 'pedido_produtos');
    }
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }
}
