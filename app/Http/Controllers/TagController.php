<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Tag;
use Carbon\Carbon;
use Session;

class TagController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Tag::where('tag_status',1)->orderBy('tag_id','DESC')->get();
        return view('admin.tag.all',compact('all'));
    }

    public function add(){
        return view('admin.tag.add');
    }

    public function edit($slug){
        $data=Tag::where('tag_status',1)->where('tag_slug',$slug)->firstOrFail();
        return view('admin.tag.edit',compact('data'));
    }

    public function view($slug){
        $data=Tag::where('tag_status',1)->where('tag_slug',$slug)->firstOrFail();
        return view('admin.tag.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:tags,tag_name',
        ],[
            'name.required'=>'Please enter blog tag name!',
        ]);

        $slug=Str::slug($request['name'],'-');
        $creator=Auth::user()->id;
        $insert=Tag::insert([
            'tag_name'=>$request['name'],
            'tag_slug'=>$slug,
            'tag_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/blog/tag/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/blog/tag/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ],[
            'name.required'=>'Please enter blog tag name!',
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $insert=Tag::where('tag_id',$id)->update([
            'tag_name'=>$request['name'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/blog/tag/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/blog/tag/view/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Tag::where('tag_status',1)->where('tag_id',$id)->update([
            'tag_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/blog/tag');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/blog/tag');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Tag::where('tag_status',0)->where('tag_id',$id)->update([
            'tag_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/blog/tag');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/blog/tag');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Tag::where('tag_status',0)->where('tag_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/blog/tag');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/blog/tag');
        }
    }
}
