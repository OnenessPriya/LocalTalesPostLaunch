<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['id', 'business_id', 'page', 'slot_id', 'image', 'redirect_link', 'target_postcode',  'target_city', 'target_state', 'click_count'];



    public function business() {
        return $this->belongsTo('App\Models\Business', 'business_id', 'id');
    }
}
