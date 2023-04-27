<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model{
    protected $primaryKey='pc_id';

    public function page(){
        return $this->belongsTo('App\Page','page_id','page_id');
    }
}
