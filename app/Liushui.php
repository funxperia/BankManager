<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liushui extends Model
{
    public function user(){
        //$liushui -> user();
        return $this -> belongsTo('App\User');
    }
}
