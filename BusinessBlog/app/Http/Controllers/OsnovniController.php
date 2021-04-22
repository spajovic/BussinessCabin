<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Navigations;
use App\Models\Posts;
use App\Models\SocialsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OsnovniController extends Controller
{
    protected $data = [];
    public function __construct()
    {
        $kategorije = Categories::with('posts')->withCount('posts')->orderBy('categories.id','ASC')->get();
        $this->data['socials'] = SocialsModel::all();
        $this->data['categories'] = $kategorije;
        $this->data['navigation'] = Navigations::all();
        return $this->data;
    }
}
