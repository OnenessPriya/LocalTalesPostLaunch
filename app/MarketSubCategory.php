<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketSubCategory extends Model
{
    protected $table = 'market_sub_categories';
    
    public function category() {
        return $this->belongsTo('App\MarketCategory', 'category_id', 'id');
    }
    public function product(){
    	return $this->hasMany(MarketProduct::class);
	}
}
