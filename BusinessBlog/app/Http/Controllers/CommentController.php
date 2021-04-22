<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(CommentRequest $request)
    {
        $value = $request->get('commentText');
        $post_id = $request->get('categoryId');
        $date = date('Y/m/d h:i:s ', time());
        $user_id = session()->get('user')->users_id;
        $parent_id = 0;
        $comment = new Comment();
            try{
                $comment->user_id = $user_id;
                $comment->parent_id = $parent_id;
                $comment->comment = $value;
                $comment->post_id = $post_id;
                $comment->created_at = $date;

                if($comment->save()){
                    Log::channel('userActions')->info('Commented on post (id: '.$post_id.')',[
                        'user_email' => session()->get('user')->email
                    ]);
                    return redirect()->route('posts.show',$post_id)->with('success','Succesfully Commented');
                }
                return redirect()->route('posts.show',$post_id)->with('fail','Please try later');
            }
            catch (\Exception $e){
                Log::error($e->getMessage());
            }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        try {
            Log::channel('userActions')->info('Deleted comment '.$comment->comment_id,[
                'user_email' => session()->get('user')->email
            ]);
            $comment->delete();
            return redirect()->back()->with('success','You deleted comment');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
