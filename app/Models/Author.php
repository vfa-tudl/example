<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 
    ];

   /**
    * The roles that belong to the Author
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
   public function Posts()
   {
       return $this->belongsToMany(Post::class, 'post_author', 'author_id', 'post_id');
   }
   /**
    * Get the user associated with the Author
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function user()
   {
       return $this->hasOne(User::class,'id','user_id');
   }
}
