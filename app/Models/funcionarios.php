<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class funcionarios extends Model
{
    protected $table = 'tabela_funcionarios';
    protected $fillable = ['nome', 'cargo', 'telefone', 'email'];
    public $timestamps = false;
}
