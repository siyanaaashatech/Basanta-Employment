<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone_no', 'email', 'country_id', 'university_id', 'course_id', 'intake_date', 'photo'];
}
