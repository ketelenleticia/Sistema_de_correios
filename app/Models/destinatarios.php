<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinatarios extends Model
{
    protected $table = 'destinatarios';
    protected $fillable = ['nome', 'cpf', 'telefone', 'endereco'];
    public $timestamps = false;

     public function encomendas()
    {
        return $this->hasMany(Encomendas::class, 'id_destinatarios');
    }

}