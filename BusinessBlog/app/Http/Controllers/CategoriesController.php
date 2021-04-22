<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Symfony\Component\String\s;

class CategoriesController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.pages.categories.create-categories');
    }


    public function store(CategoryRequest $request)
    {
        $name = $request->get('createCategoryName');
        try {
            $category = new Categories();
            $category->name = $name;
            $uspeh = $category->save();
            if($uspeh){
                Log::channel('userActions')->info('Created new Category',[
                    'user_email' => session()->get('user')->email
                ]);
                return redirect()->route('admin-categories')->with('success','Succesfully inserted');
            }
            else{
                return redirect()->route('admin-categories')->with('fail','Something went wrong');
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

    public function edit(Categories $category)
    {
        return view('admin.pages.categories.update-categories',['category' => $category]);
    }

    public function update(Request $request, Categories $category)
    {
        try{
            $name = $request->get('createCategoryName');
            $category->name = $name;
            $uspeh = $category->save();
            if($uspeh){
                Log::channel('userActions')->info('Updated Category '.$category->id,[
                    'user_email' => session()->get('user')->email
                ]);
                return redirect()->route('admin-categories')->with('success','Succesfully updated');
            }
            else{
                return redirect()->route('admin-categories')->with('fail','Something went wrong');
            }

        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }


    public function destroy(Categories $category)
    {
        try {
            Log::channel('userActions')->info('Deleted Category '.$category->id,[
                'user_email' => session()->get('user')->email
            ]);
            $category->delete();
            return redirect()->back()->with('success','You deleted category');
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
