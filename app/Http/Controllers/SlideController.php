<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Datetime;
class SlideController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    // index
    public function index()
    {
        if(!Right::check('Slideshow', 'l')){
            return view('permissions.no');
        }
        $data['slides'] = DB::table('slides')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->get();
        return view('slides.index', $data);
    }
    public function create()
    {
        if(!Right::check('Slideshow', 'i')){
            return view('permissions.no');
        }
        return view('slides.create');
    }
    public function save(Request $r)
    {
        if(!Right::check('Slideshow', 'i')){
            return view('permissions.no');
        }
        $data = array(
            'order' => $r->order,
        );
        $date = new Datetime('now');
        $get_date_time = $date->format('d-m-Y').'-'.$date->format('H-i-s');
        if($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = $get_date_time.$ss;
            $destinationPath = 'fronts/slides/';
            $file->move($destinationPath, $file_name);
            $data['photo'] = $file_name;
        }
        
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('slides')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/slide/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/slide/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        if(!Right::check('Slideshow', 'd')){
            return view('permissions.no');
        }
        DB::table('slides')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/slide');
    }
    public function edit($id)
    {
        if(!Right::check('Slideshow', 'u')){
            return view('permissions.no');
        }
        $data['slide'] = DB::table('slides')
            ->where('id',$id)->first();
        return view('slides.edit', $data);
    }
    
    public function update(Request $r)
    {
        if(!Right::check('Slideshow', 'u')){
            return view('permissions.no');
        }
        $data = array(
            'order' => $r->order
        );
        $date = new Datetime('now');
        $get_date_time = $date->format('d-m-Y').'-'.$date->format('H-i-s');
        if ($r->photo) {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $ss = substr($file_name, strripos($file_name, '.'), strlen($file_name));
            $file_name = $get_date_time.$ss;
            $destinationPath = 'fronts/slides/';
            $file->move($destinationPath, $file_name);
            $data = array(
	            'photo' => $file_name,
            );
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('slides')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/slide/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/slide/edit/'.$r->id);
        }
    }
}

