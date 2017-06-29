<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
	public function driver_name()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

    public function state()
    {
    	return $this->belongsTo('App\State', 'state_id');
    }

    public function age_group()
    {
    	return $this->belongsTo('App\age_group', 'age_group_id');
    }
}
