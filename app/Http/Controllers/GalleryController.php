<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\GalleryCategory;
use App\Models\Gallery;
use Carbon\Carbon;
use Session;
use Image;

class GalleryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Gallery::where('gallery_status',1)->orderBy('gallery_id','DESC')->get();
        return view('admin.gallery.all',compact('all'));
    }

    public function add(){
        $allCate=GalleryCategory::where('gcate_status',1)->orderBy('gcate_id','ASC')->get();
        return view('admin.gallery.add',compact('allCate'));
    }

    public function edit($slug){
        $allCate=GalleryCategory::where('gcate_status',1)->orderBy('gcate_id','ASC')->get();
        $data=Gallery::where('gallery_status',1)->where('gallery_slug',$slug)->firstOrFail();
        return view('admin.gallery.edit',compact('data','allCate'));
    }

    public function view($slug){
        $data=Gallery::where('gallery_status',1)->where('gallery_slug',$slug)->firstOrFail();
        return view('admin.gallery.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'cate'=>'required',
            'pic'=>'required',
        ],[
            'title.required'=>'Please enter partner title!',
            'cate.required'=>'Please select gallery category!',
            'pic.required'=>'Please upload gallery photo!',
        ]);
        $slug='G'.uniqid(20);
        $creator=Auth::user()->id;
        $insert=Gallery::insertGetId([
            'gallery_title'=>$_POST['title'],
            'gcate_id'=>$_POST['cate'],
            'gallery_photo'=>'',
            'gallery_creator'=>$creator,
            'gallery_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='gallery_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/gallery/'.$imageName);

          Gallery::where('gallery_id',$insert)->update([
              'gallery_photo'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/gallery/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/gallery/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'cate'=>'required',
        ],[
            'title.required'=>'Please enter partner title!',
            'cate.required'=>'Please select gallery category!',
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $insert=Gallery::where('gallery_id',$id)->update([
            'gallery_title'=>$_POST['title'],
            'gcate_id'=>$_POST['cate'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='gallery_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/gallery/'.$imageName);

          Gallery::where('gallery_id',$insert)->update([
              'gallery_photo'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/gallery/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/gallery/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Gallery::where('gallery_status',1)->where('gallery_id',$id)->update([
            'gallery_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/gallery');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/gallery');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Gallery::where('gallery_status',0)->where('gallery_id',$id)->update([
            'gallery_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/gallery');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/gallery');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Gallery::where('gallery_status',0)->where('gallery_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/gallery');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/gallery');
        }
    }
}
