<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account_detail extends Model
{
    public function scopeSearchAccountDetails($query, $keyword)
    {
        if($keyword != '')
        {

                $query->where(function ($query) use ($keyword)

            {
                $query->where("account_name", "LIKE", "%$keyword%")
                    ->orWhere("account_number", "LIKE", "%$keyword%")
                    ->orWhere("bank_name", "LIKE", "%$keyword%")
                    ->orWhere("user_id", "LIKE", "%$keyword%");
            });
            
        }

        return $query;
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
