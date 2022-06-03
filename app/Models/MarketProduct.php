<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketProduct extends Model
{

    public function category() {
        return $this->belongsTo('App\MarketCategory', 'cat_id', 'id');
    }
    public function subcategory() {
        return $this->belongsTo('App\MarketSubCategory', 'sub_cat_id', 'id');
    }

}
