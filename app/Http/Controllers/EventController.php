<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Event;
use Carbon\Carbon;
use Session;
use Image;

class EventController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Event::where('event_status',1)->orderBy('event_id','DESC')->get();
        return view('admin.event.all',compact('all'));
    }

    public function add(){
        return view('admin.event.add');
    }

    public function edit($slug){
        $data=Event::where('event_status',1)->where('event_slug',$slug)->firstOrFail();
        return view('admin.event.edit',compact('data'));
    }

    public function view($slug){
        $data=Event::where('event_status',1)->where('event_slug',$slug)->firstOrFail();
        return view('admin.event.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'pic'=>'required',
        ],[
            'title.required'=>'Please enter event title!',
            'pic.required'=>'Please upload event image!',
        ]);
        $slugTitle=Str::slug($request['title'],'-');
        $time=Carbon::now()->toDateTimeString();
        $slugTime=date('Y-m-d', strtotime($time));
        $slug=$slugTime.'-'.$slugTitle;
        $insert=Event::insertGetId([
            'event_title'=>$_POST['title'],
            'event_subtitle'=>$_POST['subtitle'],
            'event_details'=>$_POST['details'],
            'event_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='event_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/event/'.$imageName));

          Event::where('event_id',$insert)->update([
              'event_image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/event/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/event/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required',
        ],[
            'title.required'=>'Please enter event title!',
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $insert=Event::where('event_id',$id)->update([
            'event_title'=>$_POST['title'],
            'event_subtitle'=>$_POST['subtitle'],
            'event_details'=>$_POST['details'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='event_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/event/'.$imageName));

          Event::where('event_id',$id)->update([
              'event_image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/event/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/event/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Event::where('event_status',1)->where('event_id',$id)->update([
            'event_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/event');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/event');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Event::where('event_status',0)->where('event_id',$id)->update([
            'event_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/event');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/event');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Event::where('event_status',0)->where('event_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/event');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/event');
        }
    }
}
