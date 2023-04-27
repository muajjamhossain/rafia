<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\GalleryCategory;
use Carbon\Carbon;
use Session;
class GalleryCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=GalleryCategory::where('gcate_status',1)->orderBy('gcate_id','DESC')->get();
        return view('admin.gallery-category.all',compact('all'));
    }

    public function add(){
        return view('admin.gallery-category.add');
    }

    public function edit($slug){
        $data=GalleryCategory::where('gcate_status',1)->where('gcate_slug',$slug)->firstOrFail();
        return view('admin.gallery-category.edit',compact('data'));
    }

    public function view($slug){
        $data=GalleryCategory::where('gcate_status',1)->where('gcate_slug',$slug)->firstOrFail();
        return view('admin.gallery-category.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:gallery_categories,gcate_name'
        ],[
            'name.required'=>'Please enter gallery category name!'
        ]);

        $slug=Str::slug($request['name'],'-');
        $insert=GalleryCategory::insert([
            'gcate_name'=>$request['name'],
            'gcate_remarks'=>$request['remarks'],
            'gcate_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/gallery/category/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/gallery/category/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>'Please enter gallery category name!'
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $update=GalleryCategory::where('gcate_id',$id)->update([
            'gcate_name'=>$request['name'],
            'gcate_remarks'=>$request['remarks'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/gallery/category/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/gallery/category/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=GalleryCategory::where('gcate_status',1)->where('gcate_id',$id)->update([
            'gcate_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/gallery/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/gallery/category');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=GalleryCategory::where('gcate_status',0)->where('gcate_id',$id)->update([
            'gcate_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/gallery/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/gallery/category');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=GalleryCategory::where('gcate_status',0)->where('gcate_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/gallery/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/gallery/category');
        }
    }
}
