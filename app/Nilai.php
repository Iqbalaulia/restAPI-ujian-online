<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
     protected $table="tbl_nilais";

    protected $guarded=['id'];

    function user(){
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
}

