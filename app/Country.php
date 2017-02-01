<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primaryKey = 'Id';
    protected $table='country';
    
    public function customers(){
        return $this->hasMany('\App\Customer','IdCountry');
    }
}
