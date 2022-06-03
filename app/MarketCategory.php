<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketCategory extends Model
{
    protected $table = 'market_categories';

    public function product(){
    	return $this->hasMany(MarketProduct::class);
	}
}
