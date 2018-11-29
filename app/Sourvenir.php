<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sourvenir extends Model
{
    //table
    protected  $table = 'sourvenirs';

    // primary key

    public $primaryKey = 'id';

    public function preference(){
        return $this->belongsTo('App\Preference');
    }
}
