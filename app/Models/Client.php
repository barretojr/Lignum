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
    protected $nullable = [
        'rg',
        'cpf',
        'birthday',
        'cellphone',
        'cep',
    ];
    
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->nullable) && $value === '') {
            $this->attributes[$key] = null;
        } else {
            parent::setAttribute($key, $value);
        }
    }

}
