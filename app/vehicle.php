<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    public function state()
    {
    	return $this->belongsTo('App\State', 'state_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
