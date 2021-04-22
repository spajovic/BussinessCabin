<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.pages.Tags.create-tags');
    }


    public function store(CreateTagRequest $request)
    {
        DB::beginTransaction();
        $name = $request->get('createTagName');
        try {
            $tag = new Tags();
            $tag->name = $name;
            $uspeh = $tag->save();
            if($uspeh){
                Log::channel('userActions')->info('Created Tag',[
                    'user_email' => session()->get('user')->email
                ]);
                return redirect()->route('admin-tags')->with('success','Succesfully inserted');
            }
            else{
                return redirect()->route('admin-tags')->with('fail','Something went wrong');
            }
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(Tags $tag)
    {
        return view('admin.pages.Tags.update-tags',['tag' => $tag]);
    }


    public function update(UpdateTagRequest $request, Tags $tag)
    {
        try{
            $name = $request->get('updateTagName');
            $tag->name = $name;
            $uspeh = $tag->save();
            if($uspeh){
                Log::channel('userActions')->info('Updated tag '.$tag->id,[
                    'user_email' => session()->get('user')->email
                ]);
                return redirect()->route('admin-tags')->with('success','Succesfully updated');
            }
            else{
                return redirect()->route('admin-tags')->with('fail','Something went wrong');
            }

        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function destroy(Tags $tag)
    {
        try {
            Log::channel('userActions')->info('Deleted Tag '.$tag->id,[
                'user_email' => session()->get('user')->email
            ]);
            $tag->delete();
            return redirect()->back()->with('success','You deleted tag');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
