<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class remetentes extends Model
{
    protected $table = 'tabela_remetentes';
    protected $fillable = ['nome', 'cpf', 'telefone', 'endereco'];
    public $timestamps = false;

    public function encomendas()
    {
        return $this->hasMany(encomendas::class, 'id_remetentes');
    }
}