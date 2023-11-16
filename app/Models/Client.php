<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'rg',
        'cpf',
        'birthday',
        'email',
        'cellphone',
        'address',
        'number',
        'cep',
        'status'
    ];

}
