<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partenaires extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'telephone',
        'adresse',
        'types',
        'altitude',
        'longitude',



    ];
}
