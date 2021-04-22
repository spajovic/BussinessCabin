<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateRequest;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\PostPictures;
use App\Models\Posts;
use App\Models\Tags;
use App\Models\Users;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PostController extends OsnovniController
{
    const PAGE_LIMIT = 3;
    public function index()
    {
        $this->data['tags'] = Tags::all();
        $this->data['posts'] = Posts::with('categories')
            ->with('picture')
            ->select('posts.id','posts.heading','posts.main_text','posts.created_at','post_pictures.filename')
            ->join('post_pictures','posts.id','=','post_pictures.posts_id')
            ->orderBy('posts.created_at','DESC')
            ->paginate(self::PAGE_LIMIT);

        $this->data['recent'] = Posts::with('categories')
            ->select('posts.id','posts.heading','posts.main_text','posts.created_at','post_pictures.filename')
            ->orderBy('posts.created_at', 'DESC')
            ->limit(3)
            ->join('post_pictures','posts.id','=','post_pictures.posts_id')
            ->get();
        return view('pages.posts-page',$this->data);
    }

    public function ajaxFilter(Request $request){

        if($request->has('search')){
            $search = $request->get('search');
            try{
                $posts = Posts::with('categories')
                    ->select('posts.id','posts.heading','posts.main_text','posts.created_at','post_pictures.filename')
                    ->join('post_pictures','posts.id','=','post_pictures.posts_id')
                    ->where('posts.main_text','like','%'.$search.'%')
                    ->orWhere('posts.heading','like','%'.$search.'%')
                    ->orderBy('posts.created_at','DESC')
                    ->paginate(self::PAGE_LIMIT);
                if($posts){
                    return response()->json($posts);
                }
            }
            catch (\Exception $e){
                Log::error($e->getMessage());
            }
        }

        if($request->has('tag')){
            $tag = $request->get('tag');
            try {
                $tag = Tags::find($tag);
                $posts = $tag->posts()
                    ->select('posts.id','posts.heading','posts.main_text','posts.created_at','post_pictures.filename')
                    ->join('post_pictures','posts.id','=','post_pictures.posts_id')
                    ->orderBy('posts.created_at','DESC')
                    ->paginate(self::PAGE_LIMIT);
                if($posts){
                    return response()->json($posts);
                }
            }
            catch (\Exception $e){
                Log::error($e->getMessage());
            }
        }
        if($request->has('category')){
            $category = $request->get('category');
            try{
                $category = Categories::find($category);
                $posts = $category->posts()
                    ->select('posts.id','posts.heading','posts.main_text','posts.created_at','post_pictures.filename')
                    ->join('post_pictures','posts.id','=','post_pictures.posts_id')
                    ->orderBy('posts.created_at','DESC')
                    ->paginate(3);
                if($posts){
                    return response()->json($posts);
                }
            }
            catch (\Exception $e){
                redirect()->route('home');
                Log::error($e->getMessage());
            }
        }

    }

    public function create()
    {
        $this->data['tags'] = Tags::all();
        return view('admin.pages.posts.create-posts',$this->data);
    }

    public function store(Request $request)
    {
        $date = date('m/d/Y h:i:s', time());
        $heading = $request->get('createPostHeading');
        $content = $request->get('createPostContent');
        $category = $request->get('createPostCategory');
        $tags = $request->get('createPostTags');
        $image = $request->file('createPostPicture');

        if($image != null){
            $filename = $image->hashName();
            $image->storeAs("public/img/posts-img", $filename);
        }
        else{
            $filename = 'slika.jpeg';
        }
        try {
            $post = new Posts();
            $post->heading = $heading;
            $post->main_text = $content;
            $post->category_id = $category;
            $post->created_at = $date;
            $uspeh = $post->save();
            if($uspeh){
                $id = Posts::max('id');
                $slika = new PostPictures();
                $slika->posts_id = $id;
                $slika->filename = $filename;
                $uspeh = $slika->save();
                if($uspeh){
                    $post->tags()->attach($tags);
                    $post->author()->attach([0 => session()->get('user')->users_id]);
                    Log::channel('userActions')->info('Created Post '.$id,[
                        'user_email' => session()->get('user')->email
                    ]);
                    return redirect()->route('admin-posts')->with('success','Successfuly created');
                }
                else{
                    return redirect()->route('admin-posts')->with('fail','Something went wrong');
                }

            }
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }


    }

    public function show(Posts $post)
    {
        $auth = $post->author()->first();
        $slika = $auth->picture->filename;
        $auth->profilna = $slika;
        $komentari = $post->comments()
            ->select('comments.comment','user_pictures.filename','users.name','users.surname','users.users_id','comments.created_at')
            ->join('users','users.users_id','=','comments.user_id')
            ->join('user_pictures','users.users_id','=','user_pictures.user_pictures_id')
            ->get();
        $brojkomentara = $post->comments()->count();
        $post->brojkomentara = $brojkomentara;
        $post->comms = $komentari;
        $post->category_name = $post->categories->name;
        $post->filename = $post->picture->filename;
        $post->tagnames = $post->tags()->get();
        $post->autor = $auth;
        $this->data['post'] = $post;
        return view('pages.single-post-page',$this->data);
    }

    public function edit(Posts $post)
    {
        $this->data['tags'] = Tags::all();
        $tags = $post->tags()->get();
        $this->data['post'] = $post;
        $this->data['post']->tagovi = $tags;
        $this->data['post']->kategorija = $post->categories->id;
        return view('admin.pages.posts.update-posts',$this->data);
    }

    public function update(PostUpdateRequest $request, Posts $post)
    {
        if(count($request->all()) > 0){
            $heading = $request->updatePostHeading;
            $content = $request->updatePostContent;
            $category = $request->updatePostCategory;
            $tags = $request->updatePostTags;
            $image = $request->file('updatePostPicture');

            if($image != null){
                $filename = $image->hashName();
                $image->storeAs("public/img/posts-img", $filename);
            }
            try{
                $post->heading = $heading;
                $post->main_text = $content;
                $post->category_id = $category;
                if($image) {
                    $slika = PostPictures::where('posts_id', '=', $post->id)->first();
                    $slika->filename = $filename;
                    $slika->save();
                }
                $post->tags()->sync($tags);
                $uspeh = $post->save();
                if($uspeh){
                    Log::channel('userActions')->info('Updated Post '.$post->id,[
                        'user_email' => session()->get('user')->email
                    ]);
                    return redirect()->route('admin-posts')->with('success','Successfull update');
                }
                else{
                    return redirect()->route('admin-posts')->with('fail','Please try again later');

                }
            }
            catch (\Exception $e){
                Log::error($e->getMessage());
            }


        }
    }

    public function destroy(Posts $post)
    {
        try {
            Log::channel('userActions')->info('Deleted Post '.$post->id,[
                'user_email' => session()->get('user')->email
            ]);
            $post->delete();
            return redirect()->back()->with('success','You deleted post');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
