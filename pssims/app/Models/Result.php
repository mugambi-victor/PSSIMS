<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use MongoDB\Laravel\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'results';

    protected $fillable = [
        'result_name',
        'term_id',
        
    ];
}
