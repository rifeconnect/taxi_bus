<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
   public function Booking()
   {
   	return $this->belongsTo(Booking::class);
   }
}
