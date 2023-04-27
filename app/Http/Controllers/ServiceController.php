<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Service;
use Carbon\Carbon;
use Session;
use Image;

class ServiceController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Service::where('service_status',1)->orderBy('service_id','DESC')->get();
        return view('admin.service.all',compact('all'));
    }

    public function add(){
        return view('admin.service.add');
    }

    public function edit($slug){
        $data=Service::where('service_status',1)->where('service_slug',$slug)->firstOrFail();
        return view('admin.service.edit',compact('data'));
    }

    public function view($slug){
        $data=Service::where('service_status',1)->where('service_slug',$slug)->firstOrFail();
        return view('admin.service.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'pic'=>'required',
        ],[
            'title.required'=>'Please enter service title!',
            'pic.required'=>'Please upload service image!',
        ]);
        $slug=Str::slug($request['title'],'-');
        $insert=Service::insertGetId([
            'service_title'=>$_POST['title'],
            'service_subtitle'=>$_POST['subtitle'],
            'service_details'=>$_POST['details'],
            'service_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='service_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/service/'.$imageName));

          Service::where('service_id',$insert)->update([
              'service_image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/service/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/service/add');
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
        $insert=Service::where('service_id',$id)->update([
            'service_title'=>$_POST['title'],
            'service_subtitle'=>$_POST['subtitle'],
            'service_details'=>$_POST['details'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='service_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/service/'.$imageName));

          Service::where('service_id',$id)->update([
              'service_image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/service/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/service/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Service::where('service_status',1)->where('service_id',$id)->update([
            'service_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/service');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/service');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Service::where('service_status',0)->where('service_id',$id)->update([
            'service_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/service');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/service');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Service::where('service_status',0)->where('service_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/service');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/service');
        }
    }
}
