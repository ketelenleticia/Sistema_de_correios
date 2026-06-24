<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    protected $table = 'funcionarios';
    protected $fillable = ['nome', 'cargo', 'telefone', 'email'];
    public $timestamps = false;
}
