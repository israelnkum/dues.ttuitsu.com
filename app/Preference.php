<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    //table
    protected  $table = 'preferences';

    // primary key

    public $primaryKey = 'id';

    public function souvenir(){
        return $this->hasMany('App\Sourvenir');
    }

    public function amount(){
        return $this->hasMany('App\Student');
    }
}
