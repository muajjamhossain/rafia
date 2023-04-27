<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Video;
use Carbon\Carbon;
use Session;
use Image;

class VideoController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Video::where('video_status',1)->orderBy('video_id','DESC')->get();
        return view('admin.video.all',compact('all'));
    }

    public function add(){
        return view('admin.video.add');
    }

    public function view($slug){
        $data=Video::where('video_status',1)->where('video_slug',$slug)->firstOrFail();
        return view('admin.video.view',compact('data'));
    }

    public function edit($slug){
        $data=Video::where('video_status',1)->where('video_slug',$slug)->firstOrFail();
        return view('admin.video.edit',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'url'=>'required',
        ],[
            'title.required'=>'Please enter video title!',
            'url.required'=>'Please enter video url!',
        ]);
        $slug='V'.uniqid(20);
        $insert=Video::insertGetId([
            'video_title'=>$_POST['title'],
            'video_url'=>$_POST['url'],
            'video_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/video/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/video/add');
        }
    }

    public function update(Request $request){
       $this->validate($request,[
            'title'=>'required',
            'url'=>'required',
        ],[
            'title.required'=>'Please enter video title!',
            'url.required'=>'Please enter video url!',
        ]);
        $slug=$_POST['slug'];
        $id=$_POST['id'];
        $update=Video::where('video_id',$id)->update([
            'video_title'=>$_POST['title'],
            'video_url'=>$_POST['url'],
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/video/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/video/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Video::where('video_status',1)->where('video_id',$id)->update([
            'video_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/video');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/video');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Video::where('video_status',0)->where('video_id',$id)->update([
            'video_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/video');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/video');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Video::where('video_status',0)->where('video_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/video');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/video');
        }
    }
}
