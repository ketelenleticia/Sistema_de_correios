<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class destinatarios extends Model
{
    protected $table = 'tabela_destinatarios';
    protected $fillable = ['nome', 'cpf', 'telefone', 'endereco'];
    public $timestamps = false;

     public function encomendas()
    {
        return $this->hasMany(encomendas::class, 'id_destinatarios');
    }

}