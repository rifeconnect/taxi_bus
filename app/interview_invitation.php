<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interview_invitation extends Model
{
    public function interview_centre()
    {
    	return $this->belongsTo('App\interview_centre', 'interview_centre_id');
    }
}
