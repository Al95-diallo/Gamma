<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class charges extends Model
{
    use HasFactory;
    protected $fillable = [
        'charges',
        'montants',
        'taux',
    ];
    // public function Police(){
    //     return $this->belongsToMany('App\Models\Polices','pivotpolice')->withPivot('police_id');
    //     }
    
        public function assurees(){
        return $this->belongsToMany(assuree::class);
        }
        // public function pivotpolices()
        // {
        //  return $this->hasMany('App\Models\pivotpolice');
        // }
}
