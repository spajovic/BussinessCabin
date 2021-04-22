<?php

namespace App\Models;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'users_id';

    public function posts(){
        return $this->belongsToMany(Posts::class,'user_posts','users_id','posts_id');
    }

    public function picture(){
        return $this->hasOne(UserPicture::class,'user_pictures_id');
    }

    public function roles(){
        return $this->belongsTo(Roles::class);
    }

    public function register(RegisterRequest $request){
        $user = new Users();
        try{
            $user->name =ucfirst($request->get('register-name'));
            $user->surname = ucfirst($request->get('register-surname'));
            $user->email = $request->get('register-email');
            $user->password = Hash::make($request->get('register-passwd'));
            if($user->save()){
                $id = Users::max('users_id');
                $userpicture = new UserPicture();
                $userpicture->user_pictures_id = $id;
                $userpicture->filename = 'profilna.jpg';
                $userpicture->save();
                Log::channel('userActions')->info('Registered',[
                    'user_email' => $user->email
                ]);
                return true;
            }
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return false;
        }
    }

    public function login(LoginRequest $request){
        $email = $request->get('login-email');
        $password = $request->get('login-passwd');
        try{
            $user = Users::where('email','=',$email)->first();
            if($user == null){
                return false;
            }
            if(Hash::check($password,$user->password)){
                $picture = $user->picture->filename;
                $user->picture = $picture;
                session()->put('user',$user);
                Log::channel('userActions')->info('Logged in',[
                    'user_email' => session()->get('user')->email
                ]);
                return true;
            }
            else{
                return false;
            }
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

}
