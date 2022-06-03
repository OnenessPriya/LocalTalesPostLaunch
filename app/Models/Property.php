<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

	protected $fillable = [
	   'title', 'image', 'address', 'lat', 'lon', 'business_id', 'overview', 'amenities', 'near_by', 'contact_person', 'contact_email', 'contact_phone', 'status'
	];

	//hasOne relation with Category Model
	public function business(){
	    return $this->hasOne(Business::class, 'id', 'business_id');
	}
}
