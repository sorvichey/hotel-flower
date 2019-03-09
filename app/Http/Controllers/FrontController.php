<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class FrontController extends Controller
{
   
    // index
    public function index()
    {
        $data['post'] = DB::table('posts')
            ->where('active', 1)
            ->get();
        return view('fronts.index', $data);
    }
   public function post($id)
   {
        $data['video'] = null;
        
       $data['post'] = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->where('posts.id', $id)
            ->select('posts.*', 'categories.name')
            ->first();
        return view('fronts.detail', $data);
       
   }
}
