<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Session;

class BlogCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=BlogCategory::where('bcate_status',1)->orderBy('bcate_id','DESC')->get();
        return view('admin.blog-category.all',compact('all'));
    }

    public function add(){
        return view('admin.blog-category.add');
    }

    public function edit($slug){
        $data=BlogCategory::where('bcate_status',1)->where('bcate_slug',$slug)->firstOrFail();
        return view('admin.blog-category.edit',compact('data'));
    }

    public function view($slug){
        $data=BlogCategory::where('bcate_status',1)->where('bcate_slug',$slug)->firstOrFail();
        return view('admin.blog-category.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:blog_categories,bcate_name',
        ],[
            'name.required'=>'Please enter blog category name!',
        ]);

        $slug=Str::slug($request['name'],'-');
        $creator=Auth::user()->id;
        $insert=BlogCategory::insert([
            'bcate_name'=>$request['name'],
            'bcate_slug'=>$slug,
            'bcate_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/blog/category/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/blog/category/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ],[
            'name.required'=>'Please enter blog category name!',
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $insert=BlogCategory::where('bcate_id',$id)->update([
            'bcate_name'=>$request['name'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/blog/category/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/blog/category/view/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=BlogCategory::where('bcate_status',1)->where('bcate_id',$id)->update([
            'bcate_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/blog/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/blog/category');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=BlogCategory::where('bcate_status',0)->where('bcate_id',$id)->update([
            'bcate_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/blog/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/blog/category');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=BlogCategory::where('bcate_status',0)->where('bcate_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/blog/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/blog/category');
        }
    }
}
