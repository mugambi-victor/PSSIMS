<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Student extends Model
{

    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection ='students';

    protected $fillable = [
        'name',
        'registration_number',
        'guardian_name',
        'year_of_joining',
        'grade_id',
        'term_id',
        'academic_year_id',
        'guardian_password'
    ];
}
