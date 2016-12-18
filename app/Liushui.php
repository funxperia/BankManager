<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liushui extends Model
{
    protected $fillable = [
        'status','operate',
    ];

    public function user(){
        //$liushui -> user();
        return $this -> belongsTo('App\User');
    }
}
