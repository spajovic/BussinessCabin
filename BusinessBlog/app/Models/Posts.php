<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';

    public function author(){
        return $this->belongsToMany(Users::class,'user_posts','posts_id','users_id');
    }

    public function tags(){
        return $this->belongsToMany(Tags::class,'tags_posts');
    }

    public function categories(){
        return $this->belongsTo(Categories::class,'category_id');
    }
    public function picture(){
        return $this->hasOne(PostPictures::class,'posts_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id')->where('parent_id','=',0);
    }
}
