<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    //table
    protected  $table = 'payment_logs';

    // primary key

    public $primaryKey = 'id';

    protected $casts = [
        'souvenirTaken' => 'array',
    ];
    public function student(){
        return $this->belongsTo('App\Student');
    }
}
