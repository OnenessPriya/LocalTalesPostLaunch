<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogtag extends Model
{
    protected $table = 'blogtags';

	protected $fillable = [
	   'blog_id', 'tag'
	];

	//hasOne relation with Blog Model
	public function blog(){
	    return $this->hasOne(Blog::class, 'id', 'blog_id');
	}
}
