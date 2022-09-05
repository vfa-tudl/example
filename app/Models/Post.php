<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable =[
       'title', 'content'
    ];
    public function authors(){
        return $this->belongsToMany(User::class,'post_author','post_id','author_id');
    }
}
