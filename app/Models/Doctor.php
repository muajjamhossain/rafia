<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'photo',
        'degree',
        'speciality_id',
        'branch',
        'practice_days',
        'status',
    ];

    public function SpecialityInfo()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id', 'speciality_id');
    }
}

