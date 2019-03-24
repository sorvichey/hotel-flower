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
        $data['welcome'] = DB::table('welcome')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->first();
        $data['video'] = DB::table('videos')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->first();
        return view('fronts.index', $data);
    }
   public function page($id)
   {
       $data['page'] = DB::table('pages')
            ->where('id', $id)
            ->first();
        return view('fronts.page', $data);
       
   }
   public function detail($id)
   {
       $data['post'] = DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('fronts.post', $data);
   }
   
   public function room() {
       $data['rooms'] = DB::table('rooms')->where('active', 1)->get();
       return view('fronts.room', $data);
   }

   public function promotion() {
        $data['promotions'] = DB::table('promotions')->where('active', 1)->get();
        return view('fronts.promotion', $data);
    }

   public function room_detail($id) {
    $data['room'] = DB::table('rooms')->where('active', 1)->where('id', $id)->first();
    return view('fronts.room-detail', $data);
}
}
