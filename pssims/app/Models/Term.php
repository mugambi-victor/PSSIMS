<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'terms';

    protected $fillable = [
        'term_name',
        'academic_year_id',
        
    ];

}
