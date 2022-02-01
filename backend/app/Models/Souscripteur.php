<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscripteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'Adresse',
        'telephone',
        'email',
        'nb_adherant'
    ];
    public function police(){
        return $this->hasMany('App\Models\Polices');

    }
}
