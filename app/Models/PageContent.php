<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model{
    protected $primaryKey='pc_id';

    public function page(){
        return $this->belongsTo('App\Models\Page','page_id','page_id');
    }
}
