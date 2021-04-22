<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\UserPicture;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class UserController extends OsnovniController
{
    public function register(RegisterRequest $request){
        $user = new Users();
        $uspeh = $user->register($request);
        if($uspeh){
            return redirect()->back()->with('success','You created account succesfully, go ahead and login.');
        }
        else{
            return redirect()->back()->with('fail','Server error, please try again later');
        }

    }


    public function login(LoginRequest $request){
        $user = new Users();
        $uspeh = $user->login($request);
        if($uspeh){
            return redirect()->back()->with('success','You are now logged in');
        }
        else{
            return redirect()->back()->with('fail','Incorect password or email');
        }

    }

    public function logout(){
        if(session()->has('user')){
            Log::channel('userActions')->info('Logged out',[
                'user_email' => session()->get('user')->email
            ]);
            session()->flush();
            return redirect()->route('home');
        }
        else{
            return redirect()->route('home');
        }
    }

    public function updatePic(Request $request,Users $user){

        if($request->has('updateUserPicture')){
            $image       = $request->file('updateUserPicture');
            $filename = $image->hashName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300,300);
            $image_resize->save('storage/img/user-img/'.$filename);
            try{
                $userPicture = UserPicture::find($user->users_id);
                $userPicture->filename = $filename;
                $userPicture->save();
                Log::channel('userActions')->info('Changed profile picture',[
                    'user_email' => session()->get('user')->email
                ]);
                return redirect()->back()->with('success','You uploaded your new picture');

            }
            catch (\Exception $e){
                Log::error($e->getMessage());
            }
        }
        else{
            return redirect()->back()->with('fail','Your new image is missing');
        }
    }

    public function updateRole(Request $request,Users $user){

        $role_id = $request->get('updateUserRole');
        try {
            $user->roles_id = $role_id;
            if($user->save()){
                Log::channel('userActions')->info('Changed user role on user'.$user->users_id ,[
                    'user_email' => session()->get('user')->email
                ]);
                return redirect()->back();
            }
            else{
                return redirect()->back();
            }
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
