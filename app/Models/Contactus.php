<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contactus extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = [
        'conus_name',
        'conus_email',
        'conus_phone',
        'conus_sub',
        'conus_mess',
        'conus_slug',
        'conus_status',
    ];
}
