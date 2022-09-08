<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable =[
        'name', 
        'Company',
        'field_id',
        'salary',
        'location',
        'work_hour',
        'description',
        'probation',
        'display_status',
        'Image',  
    ];
}
