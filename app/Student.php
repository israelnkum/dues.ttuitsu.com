<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //table
    protected  $table = 'students';

    // primary key

    public $primaryKey = 'id';
    protected $casts = [
        'souvenir' => 'array',
    ];

    public function paymentLog(){
        return $this->hasMany('App\PaymentLog');
    }


    public function amountToPay(){
        return $this->belongsTo('App\Preference');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }
}
