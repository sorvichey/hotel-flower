<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Datetime;
use Intervention\Image\ImageManagerStatic as Image;
class PromotionController extends Controller
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
        $data['promotions'] = DB::table('promotions')
            ->where('active', 1)
            ->paginate(18);
        return view('promotions.index', $data);
    }
    // load create form
    public function create()
    {
        if(!Right::check('Post', 'i'))
        {
            return view('permissions.no');
        }
        return view('promotions.create');
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
        $i = DB::table('promotions')->insertGetId($data);
        
        if($i)
        {
            $r->session()->flash('sms', 'New promotion has been created successfully!');
            return redirect('/admin/promotion/edit/'.$i);
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new promotion. Please check your input again!');
            return redirect('/admin/promotion/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        if(!Right::check('Post', 'd'))
        {
            return view('permissions.no');
        }
        DB::table('promotions')->where('id', $id)->update(['active'=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/admin/promotion?page='.$page);
        }
        return redirect('/admin/promotion');
    }

    public function edit($id)
    {
        if(!Right::check('Post', 'u'))
        {
            return view('permissions.no');
        }
        $data['promotion'] = DB::table('promotions')
            ->where('id',$id)->first();

        return view('promotions.edit', $data);
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
        
        $i = DB::table('promotions')->where('id', $r->id)->update($data);
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/admin/promotion/edit/'.$r->id);
        }
        else
        {   
            $sms1 = "Fail to to save changes, please check again!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/promotion/edit/'.$r->id);
        }
    }
}

