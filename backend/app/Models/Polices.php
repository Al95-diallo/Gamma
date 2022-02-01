<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polices extends Model
{
    use HasFactory;
    protected $table='polices';
    protected $fillable = [
        'numero',
        'types',
        'date_debut',
        'date_fin',
        'souscripteur_id',
        'montant',
        
    ];
    public function assuree(){
        return $this->belongsToMany(assuree::class);
        }
       
        public function Souscripteur()
        {
         return $this->belongsTo('App\Models\Souscripteur');
        }
       
       
   
}
