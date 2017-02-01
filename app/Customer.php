<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'Id';
    protected $table='customer';
    
    public function country(){
        return $this->belongsTo('\App\Country','IdCountry');
    }
}
