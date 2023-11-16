<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typefinantial extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    // Relacionamento com a tabela Finantial
    public function finantials()
    {
        return $this->hasMany(Finantial::class);
    }
}
