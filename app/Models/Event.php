<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

	protected $fillable = [
	   'title', 'image', 'address', 'lat', 'lon', 'pin', 'start_date', 'end_date', 'start_time', 'end_time', 'description', 'category_id','business_id', 'contact_email', 'contact_phone', 'website', 'language_id', 'format_id', 'is_paid', 'price', 'is_recurring', 'no_of_followers', 'status'
	];

	//hasOne relation with Category Model
	public function category(){
	    return $this->hasOne(Category::class, 'id', 'category_id');
	}

	//hasOne relation with Business Model
	public function business(){
	    return $this->hasOne(Business::class, 'id', 'business_id');
	}

	//hasMany relation with Eventimage Model
	public function images(){
		return $this->hasMany(Eventimage::class);
	}

	//hasOne relation with Eventformat Model
	public function eventformat(){
	    return $this->hasOne(Eventformat::class, 'id', 'format_id');
	}

	//hasOne relation with Language Model
	public function language(){
	    return $this->hasOne(Language::class, 'id', 'language_id');
	}
}
