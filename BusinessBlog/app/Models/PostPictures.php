<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPictures extends Model
{
    use HasFactory;
    protected $table = 'post_pictures';
    protected $primaryKey = 'post_pictures_id';
}
