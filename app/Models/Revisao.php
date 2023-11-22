<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisao extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function carro()
    {
        return $this->belongsTo('App\Models\Carro');
    }

    protected $table = 'revisoes';

    protected $fillable = ['data', 'descricao', 'carro_id', 'valor', 'cliente_id'];
}
