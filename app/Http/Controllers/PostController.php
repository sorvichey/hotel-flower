<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Datetime;
use Intervention\Image\ImageManagerStatic as Image;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()==null)
            {
                return redirect("/login");
            }
            return $next($request);
        });
    }
    // index
    public function index()
    {
        if(!Right::check('Post', 'l'))
        {
            return view('permissions.no');
        }
        $data['query']= "";
        $data['posts'] = null;
        if(isset($_GET['q']))
        {
            $data['query'] = $_GET['q'];
            $query = DB::table('posts')
                ->where('posts.active', 1);
                if(Auth::user()->role_id>1)
                {
                    $query = $query->where('post_by', Auth::user()->id);
                }
            $query = $query->orderBy('posts.pin', 1)
                ->orderBy('posts.id', 'desc')
                ->where(function($fn){
                    $fn->where('posts.title', 'like', "%{$_GET['q']}%");
                    $fn->orWhere('posts.description', 'like', "%{$_GET['q']}%");
                })
                ->paginate(200);
            $data['posts'] =$query;
        }
        else{
            $query = DB::table('posts')
                ->where('posts.active', 1);
                if(Auth::user()->role_id>1)
                {
                    $query = $query->where('post_by', Auth::user()->id);
                }
               $query = $query->orderBy('posts.id', 'desc')
                ->paginate(18);
            $data['posts'] = $query;
        }
        
        return view('posts.index', $data);
    }
    // load create form
    public function create()
    {
        if(!Right::check('Post', 'i'))
        {
            return view('permissions.no');
        }
        return view('posts.create');
    }

    // save new page
    public function save(Request $r)
    {
        if(!Right::check('Post', 'i'))
        {
            return view('permissions.no');
        }
        $data = array(
            'title' => $r->title,
            'description' => $r->description
        );
        $date = new Datetime('now');
        $get_date_time = $date->format('d-m-Y').'-'.$date->format('H-i-s');
        $i = DB::table('posts')->insertGetId($data);
        
        if($i)
        {
            if($r->feature_image !== null) {
                $file = $r->file('feature_image');
                $file_name = $file->getClientOriginalName();
                $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
                $file_name = 'hotel-'.$get_date_time.'-'.$i.$ss;
                
                $destinationPath = 'uploads/posts/small/';
                $new_img = Image::make($file->getRealPath())->resize(500, null, function ($con) {
                    $con->aspectRatio();
                });
                $destinationPath2 = 'uploads/posts/';
                $new_img2 = Image::make($file->getRealPath())->resize(750, null, function ($con) {
                    $con->aspectRatio();
                });
                $new_img2->save($destinationPath2 . $file_name, 80);
                $new_img->save($destinationPath . $file_name, 80);
                
                DB::table('posts')->where('id', $i)->update(['featured_image'=>$file_name]);
            }
            $r->session()->flash('sms', 'New post has been created successfully!');
            return redirect('/admin/post/edit/'.$i);
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new post. Please check your input again!');
            return redirect('/admin/post/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        if(!Right::check('Post', 'd'))
        {
            return view('permissions.no');
        }
        DB::table('posts')->where('id', $id)->update(['active'=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/admin/post?page='.$page);
        }
        return redirect('/admin/post');
    }

    public function edit($id)
    {
        if(!Right::check('Post', 'u'))
        {
            return view('permissions.no');
        }
        $data['post'] = DB::table('posts')
            ->where('id',$id)->first();

        return view('posts.edit', $data);
    }

    public function update(Request $r)
    {
        if(!Right::check('Post', 'u'))
        {
            return view('permissions.no');
        }
        $data = array(
            'title' => $r->title,
            'description' => $r->description
        );
        $date = new Datetime('now');
        $get_date_time = $date->format('d-m-Y').'-'.$date->format('H-i-s');

        if($r->feature_image) {
            $file = $r->file('feature_image');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = 'hotel-'.$get_date_time.'-'.$r->id.$ss;
            $destinationPath = 'uploads/posts/small/';
            $new_img = Image::make($file->getRealPath())->resize(500, null, function ($con) {
                $con->aspectRatio();
            });
            $destinationPath2 = 'uploads/posts/';
            $new_img2 = Image::make($file->getRealPath())->resize(750, null, function ($con) {
                $con->aspectRatio();
            });
            $new_img2->save($destinationPath2 . $file_name, 80);
            $new_img->save($destinationPath . $file_name, 80);

            $data['featured_image'] =  $file_name;
        }
        $i = DB::table('posts')->where('id', $r->id)->update($data);
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/admin/post/edit/'.$r->id);
        }
        else
        {   
            $sms1 = "Fail to to save changes, please check again!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/post/edit/'.$r->id);
        }
    }
}

