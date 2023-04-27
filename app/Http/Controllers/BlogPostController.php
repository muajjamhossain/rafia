<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\BlogPost;
use Carbon\Carbon;
use Session;
use Image;

class BlogPostController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=BlogPost::where('post_status',1)->orderBy('post_id','DESC')->get();
        return view('admin.post.all',compact('all'));
    }

    public function add(){
        return view('admin.post.add');
    }

    public function edit($slug){
        $data=BlogPost::where('post_status',1)->where('post_slug',$slug)->firstOrFail();
        return view('admin.post.edit',compact('data'));
    }

    public function view($slug){
        $data=BlogPost::where('post_status',1)->where('post_slug',$slug)->firstOrFail();
        return view('admin.post.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'cate'=>'required',
            'tag'=>'required',
            'pic'=>'required',
        ],[
            'title.required'=>'Please enter post title!',
            'details.required'=>'Please enter post details!',
            'pic.required'=>'Please upload feature image!',
        ]);

        $cate=implode(',',$request['cate[]']);
        $creator=Auth::user()->id;
        $slug=Str::slug($request['title'],'-');
        $insert=BlogPost::insertGetId([
            'post_title'=>$_POST['title'],
            'post_details'=>$_POST['details'],
            'post_photo'=>'',
            'post_category'=>$cate,
            'post_creator'=>$creator,
            'post_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='post_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/post/'.$imageName);

          BlogPost::where('post_id',$insert)->update([
              'post_photo'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/blog/post/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/blog/post/add');
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=BlogPost::where('post_status',1)->where('post_id',$id)->update([
            'post_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/blog/post');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/blog/post');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=BlogPost::where('post_status',0)->where('post_id',$id)->update([
            'post_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/blog/post');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/blog/post');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=BlogPost::where('post_status',0)->where('post_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/blog/post');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/blog/post');
        }
    }
}
