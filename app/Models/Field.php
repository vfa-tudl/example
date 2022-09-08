<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'icon',
          
    ];
    public function Job()
    {
        return $this->hasMany(Job::class);
    }

}
