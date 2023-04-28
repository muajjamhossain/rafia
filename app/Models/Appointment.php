<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'patient_status',
        'schedule_date',
        'schedule_time',
        'description',
        'speciality_id',
        'doctor_id',
        'slug',
        'status',
    ];

    public function speciality_info()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id', 'speciality_id');
    }

    public function doctorInfo()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
