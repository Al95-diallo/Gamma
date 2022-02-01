<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pivotpolice extends Model
{
    use HasFactory;
    protected $table='pivotpolices';
    public function Polices()
    {
     return $this->hasOne(Polices::class, 'police_id');
    }
    // public function charges()
    // {
    //  return $this->hasMany('App\Models\charges');
    // }
    // public function assuree()
    // {
    //  return $this->hasMany('App\Models\assuree');
    // }
}
