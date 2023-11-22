<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finantial extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'type', 
        'value',
    ];

    // Relacionamento com a tabela Typefinantial
    public function typefinantial()
    {
        return $this->belongsTo(Typefinantial::class);
    }
}
