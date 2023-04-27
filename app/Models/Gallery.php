<?php

namespace App\Models;
use App\Models\GalleryCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory, softDeletes;
    protected $primaryKey='gallery_id';

    public function GalCate(){
        return $this->belongsTo(GalleryCategory::class,'gcate_id','gcate_id');
    }
}
