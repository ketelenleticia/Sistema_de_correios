<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encomendas extends Model
{
    protected $table = 'encomendas';

    protected $fillable = [
        'descricao',
        'peso',
        'status',
        'data_envio',
        'data_entregar',
        'id_remetentes',
        'id_destinatarios'
    ];
    public $timestamps = false;

    public function remetente()
    {
        return $this->belongsTo(Remetentes::class, 'id_remetentes');
    }

    public function destinatario()
    {
        return $this->belongsTo(Destinatarios::class, 'id_destinatarios');
    }
}