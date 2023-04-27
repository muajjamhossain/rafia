<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory, softDeletes;
    protected $primaryKey='post_id';

    public function creator(){
        return $this->belongsTo('App\User','post_creator','id');
    }
}
