<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Comment;
use App\Models\Newsletter;
use App\Models\Posts;
use App\Models\Roles;
use App\Models\Tags;
use App\Models\Users;
use Barryvdh\Reflection\DocBlock\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function firstPage(){

        return view('admin.pages.starting');
    }
    public function showPosts(){
        $postovi = Posts::with('categories')
            ->select('posts.id','posts.heading','posts.main_text','posts.created_at','post_pictures.filename')
            ->join('post_pictures','posts.id','=','post_pictures.posts_id')
            ->get();
        return view('admin.pages.posts.admin-posts',['posts'=>$postovi]);
    }
    public function showComments(){

        $comments = DB::table('comments')
            ->select('comments.comment_id','comments.comment','users.name','users.surname','posts.heading')
            ->join('users','users.users_id','=','comments.user_id')
            ->join('posts','posts.id','=','comments.post_id')
            ->get();

        return view('admin.pages.comments.admin-comments',['comments' => $comments]);
    }
    public function showCategories(){
        $categories = Categories::all();
        return view('admin.pages.categories.admin-categories',['categories' => $categories]);
    }
    public function showTags(){
        $tags = Tags::all();
        return view('admin.pages.tags.admin-tags',['tags' => $tags]);
    }
    public function showUsers(){
        $users = Users::all();
        $roles = Roles::all();
        return view('admin.pages.users.admin-users',['users'=> $users,'roles' => $roles]);
    }
    public function showNewsletter(){
        $subs = Newsletter::all();
        return view('admin.pages.newsletter.admin-newsletter',['subs'=>$subs]);
    }
    public function showLogs(){
        $filepath = storage_path('logs/useractions.log');
        $data = [];
        if(File::exists($filepath)){
            $data = [
                'filesize' => File::size($filepath),
                'file' => File::get($filepath)
            ];
        }
        return view('admin.pages.loginfo.loginfo',['data' => $data]);
    }
}
