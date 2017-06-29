<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class partner extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\user', 'user_id');
    }

    public function state()
    {
    	return $this->belongsTo('App\State', 'state_id');
    }

    public function age()
    {
    	return $this->belongsTo('App\age_group', 'age_group_id');
    }
}
