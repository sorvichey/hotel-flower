<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Datetime;
use Intervention\Image\ImageManagerStatic as Image;
class RoomController extends Controller
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
        
        $data['rooms'] = DB::table('rooms')->where('active', 1)->paginate(18);
        
        return view('rooms.index', $data);
    }
    // load create form
    public function create()
    {
        if(!Right::check('Post', 'i'))
        {
            return view('permissions.no');
        }
        return view('rooms.create');
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
        $i = DB::table('rooms')->insertGetId($data);
        
        if($i)
        {
            if($r->feature_image !== null) {
                $file = $r->file('feature_image');
                $file_name = $file->getClientOriginalName();
                $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
                $file_name = 'hotel-'.$get_date_time.$ss;
                
                $destinationPath = 'uploads/rooms/small/';
                $new_img = Image::make($file->getRealPath())->resize(500, null, function ($con) {
                    $con->aspectRatio();
                });
                $destinationPath2 = 'uploads/rooms/';
                $new_img2 = Image::make($file->getRealPath())->resize(750, null, function ($con) {
                    $con->aspectRatio();
                });
                $new_img2->save($destinationPath2 . $file_name, 80);
                $new_img->save($destinationPath . $file_name, 80);
                
                DB::table('rooms')->where('id', $i)->update(['featured_image'=>$file_name]);
            }
            $r->session()->flash('sms', 'New room has been created successfully!');
            return redirect('/admin/room/edit/'.$i);
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new room. Please check your input again!');
            return redirect('/admin/room/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        if(!Right::check('Post', 'd'))
        {
            return view('permissions.no');
        }
        DB::table('rooms')->where('id', $id)->update(['active'=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/admin/room?page='.$page);
        }
        return redirect('/admin/room');
    }

    public function edit($id)
    {
        if(!Right::check('Post', 'u'))
        {
            return view('permissions.no');
        }
        $data['room'] = DB::table('rooms')
            ->where('id',$id)->first();

        return view('rooms.edit', $data);
    }

    public function view($id)
    {
        if(!Right::check('Post', 'l'))
        {
            return view('permissions.no');
        }
        $data['room'] = DB::table('rooms')
            ->where('id',$id)->first();

        return view('rooms.detail', $data);
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
            $file_name = 'hotel-'.$get_date_time.$ss;
            $destinationPath = 'uploads/rooms/small/';
            $new_img = Image::make($file->getRealPath())->resize(500, null, function ($con) {
                $con->aspectRatio();
            });
            $destinationPath2 = 'uploads/rooms/';
            $new_img2 = Image::make($file->getRealPath())->resize(750, null, function ($con) {
                $con->aspectRatio();
            });
            $new_img2->save($destinationPath2 . $file_name, 80);
            $new_img->save($destinationPath . $file_name, 80);

            $data['featured_image'] =  $file_name;
        }
        $i = DB::table('rooms')->where('id', $r->id)->update($data);
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/admin/room/edit/'.$r->id);
        }
        else
        {   
            $sms1 = "Fail to to save changes, please check again!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/room/edit/'.$r->id);
        }
    }
}

