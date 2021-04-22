<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPicture extends Model
{
    use HasFactory;
    protected $table = 'user_pictures';
    protected $primaryKey = 'user_pictures_id';
}
