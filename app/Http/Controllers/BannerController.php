<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Banner;
use Carbon\Carbon;
use Session;
use Image;

class BannerController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Banner::where('ban_status',1)->orderBy('ban_id','DESC')->get();
        return view('admin.banner.all',compact('all'));
    }

    public function add(){
        return view('admin.banner.add');
    }

    public function edit($slug){
        $data=Banner::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.banner.edit',compact('data'));
    }

    public function view($slug){
        $data=Banner::where('ban_status',1)->where('ban_slug',$slug)->firstOrFail();
        return view('admin.banner.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'pic'=>'required',
        ],[
            'title.required'=>'Please enter banner title!',
            'pic.required'=>'Please upload banner image!',
        ]);
        $slug='BAN'.uniqid(20);
        $insert=Banner::insertGetId([
            'ban_title'=>$_POST['title'],
            'ban_details'=>$_POST['details'],
            'ban_button'=>$_POST['button'],
            'ban_button_url'=>$_POST['url'],
            'ban_image'=>'',
            'ban_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='banner_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/banner/'.$imageName));

          Banner::where('ban_id',$insert)->update([
              'ban_image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/banner/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/banner/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required',
        ],[
            'title.required'=>'Please enter banner title!',
        ]);
        $slug=$_POST['slug'];
        $id=$_POST['id'];
        $update=Banner::where('ban_slug',$slug)->update([
            'ban_title'=>$_POST['title'],
            'ban_details'=>$_POST['details'],
            'ban_button'=>$_POST['button'],
            'ban_button_url'=>$_POST['url'],
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='banner_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/banner/'.$imageName));

          Banner::where('ban_slug',$slug)->update([
              'ban_image'=>$imageName
          ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/banner/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/banner/edit/'.$slug);
        }
    }

    public function publish(){
        $id=$_POST['modal_id'];
        $soft=Banner::where('ban_status',1)->where('ban_id',$id)->update([
            'ban_publish'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_publish','value');
            return redirect('dashboard/banner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/banner');
        }
    }

    public function unpublish(){
        $id=$_POST['modal_id'];
        $soft=Banner::where('ban_status',1)->where('ban_id',$id)->update([
            'ban_publish'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_unpublish','value');
            return redirect('dashboard/banner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/banner');
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Banner::where('ban_status',1)->where('ban_id',$id)->update([
            'ban_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/banner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/banner');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Banner::where('ban_status',0)->where('ban_id',$id)->update([
            'ban_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/banner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/banner');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Banner::where('ban_status',0)->where('ban_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/banner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/banner');
        }
    }
}
