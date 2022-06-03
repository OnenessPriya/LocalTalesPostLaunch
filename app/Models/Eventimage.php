<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventimage extends Model
{
    protected $table = 'eventimages';

	protected $fillable = [
	   'event_id', 'image', 'status'
	];

	//hasOne relation with Event Model
	public function event(){
	    return $this->hasOne(Event::class, 'id', 'event_id');
	}
}
