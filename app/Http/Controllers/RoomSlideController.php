<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Datetime;
class RoomSlideController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function save(Request $r)
    {
        if(!Right::check('post', 'i')){
            return view('permissions.no');
        }
        $data = array(
            'order' => $r->order,
            'room_id' => $r->room_id
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
        
        $sms = "The new room slide has been created successfully.";
        $sms1 = "Fail to create the new room slide, please check again!";
        $i = DB::table('room_slides')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/room/view/'.$r->room_id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/room/view/'.$r->room_id)->withInput();
        }
    }
    // delete
    public function delete(Request $r, $id)
    {
        if(!Right::check('Slideshow', 'd')){
            return view('permissions.no');
        }
        $room_id = $r->query('room_id');
        DB::table('room_slides')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/room/view/'.$room_id);
    }
    public function edit($id)
    {
        if(!Right::check('Post', 'u')){
            return view('permissions.no');
        }
        $data['room_slide'] = DB::table('room_slides')
            ->where('id',$id)->first();
        return view('rooms.edit-room-slide', $data);
    }
    
    public function update(Request $r)
    {
        if(!Right::check('Slideshow', 'u')){
            return view('permissions.no');
        }
        $data = array(
            'order' => $r->order,
            'room_id' => $r->room_id
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
        $i = DB::table('room_slides')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/room/view/'.$r->room_id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/room/view/'.$r->room_id);
        }
    }
}

