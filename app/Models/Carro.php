<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    use HasFactory;

    protected $fillable = ['marca', 'modelo', 'cor', 'ano', 'placa', 'cliente_id'];
}
