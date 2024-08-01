<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pedidos;

class Prato extends Model
{
    use HasFactory;

protected $fillable = [
    "nome",
    "descricao",
    "Disponibilidade",
    "imagem",
    "preco",
    "user_id"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pedidos()
    {
        return $this->belongsToMany(Pedidos::class);
    }
    
}
