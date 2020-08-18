<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'tipo_de_usuario', 'titulo', 'descricao', 'url-image', 'texto', 'autor'
    ];
}
