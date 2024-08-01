<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'hora_pedido', 'aberto'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pratos()
    {
        return $this->belongsToMany(Prato::class);
    }
}
