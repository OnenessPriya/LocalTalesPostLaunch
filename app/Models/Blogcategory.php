<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    protected $table = 'blogcategories';

	protected $fillable = [
	   'title', 'status'
	];

	//hasMany relation with Blog Model
	public function blogs(){
    	return $this->hasMany(Blog::class);
	}
}
