<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        if(!Right::check('Page', 'l'))
        {
            return view('permissions.no');
        }
        $data['welcome'] = DB::table('welcome')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('welcome.index', $data);
    }
    // load create form
    public function create()
    {
        if(!Right::check('Page', 'i'))
        {
            return view('permissions.no');
        }
        return view('welcome.create');
    }
    // save new page
    public function save(Request $r)
    {
        if(!Right::check('Page', 'i'))
        {
            return view('permissions.no');
        }
        $data = array(
            'title' => $r->title,
            'description' => $r->description
        );
        $i = DB::table('welcome')->insertGetId($data);
        
        if($i)
        {
            $r->session()->flash('sms', 'New welcome has been created successfully!');
            return redirect('/admin/welcome/create');
        }
        else{
            $r->session()->flash('sms1', 'Fail to create new welcome. Please check your input again!');
            return redirect('/admin/welcome/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        if(!Right::check('Page', 'd'))
        {
            return view('permissions.no');
        }
        DB::table('welcome')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/welcome');
    }

    public function edit($id)
    {
        if(!Right::check('Page', 'u'))
        {
            return view('permissions.no');
        }
        $data['welcome'] = DB::table('welcome')
            ->where('id',$id)->first();
        return view('welcome.edit', $data);
    }

    public function update(Request $r)
    {
        if(!Right::check('Page', 'u'))
        {
            return view('permissions.no');
        }
        $data = array(
            'title' => $r->title,
            'description' => $r->description
        );
        $i = DB::table('welcome')->where('id', $r->id)->update($data);
        if ($i)
        {
            $sms = "All changes have been saved successfully.";
            $r->session()->flash('sms', $sms);
            return redirect('/admin/welcome/edit/'.$r->id);
        }
        else
        {   
            $sms1 = "Fail to to save changes, please check again!";
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/welcome/edit/'.$r->id);
        }
    }
}

