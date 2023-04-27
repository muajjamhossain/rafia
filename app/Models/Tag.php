<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, softDeletes;
    protected $primaryKey='tag_id';

    public function creator(){
        return $this->belongsTo('App\User','tag_creator','id');
    }
}
