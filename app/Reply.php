<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	protected $guarded = [];
	
    public function owner() {
    	return $this->belongsTo(User::class, 'user_id'); // user_id as a foriegn key bcz function is owner not user
    }
}
