<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assuree extends Model
{
    use HasFactory;
    protected $filliable  = [ 'nom','prenom','sexe','telephone','Adresse','polices_id','charge_id','nb_enfant','nb_conjoint'];

    public function polices(){
        return $this->belongsToMany(Polices::class, pivotpolice::class, 'assuree_id');
        }
        
        public function charges(){
            // return $this->belongsToMany(charges::class, pivotpolice::class);
        return $this->belongsToMany(charges::class, pivotpolice::class, 'assuree_id');

            }
        public function pivotpolice()
        {
         return $this->hasMany('App\Models\pivotpolice');
        }

        
}
