<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class encomendas extends Model
{
    protected $table = 'tabela_encomendas';

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
        return $this->belongsTo(remetentes::class, 'id_remetentes');
    }

    public function destinatario()
    {
        return $this->belongsTo(destinatarios::class, 'id_destinatarios');
    }
}