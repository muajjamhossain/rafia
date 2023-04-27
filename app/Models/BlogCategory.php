<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, softDeletes;
    protected $primaryKey='bcate_id';

    public function creator(){
        return $this->belongsTo('App\User','bcate_creator','id');
    }
}
