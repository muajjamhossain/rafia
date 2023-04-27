<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speciality extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey='speciality_id';

    protected $fillable = [
        'speciality_name',
        'speciality_remarks',
        'speciality_slug',
        'speciality_status',
    ];
}
