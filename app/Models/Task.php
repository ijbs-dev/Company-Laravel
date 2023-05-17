<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'ramo',
        'endereco',
        'telefone',
        'cnpj',
        'user_id'
        ];
}
