<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remetentes extends Model
{
    protected $table = 'remetentes';
    protected $fillable = ['nome', 'cpf', 'telefone', 'endereco'];
    public $timestamps = false;

    public function encomendas()
    {
        return $this->hasMany(Encomendas::class, 'id_remetentes');
    }
}