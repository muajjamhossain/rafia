<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Carbon\Carbon;
use App\Models\Speciality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SpecialityController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Speciality::where('speciality_status',1)->orderBy('speciality_id','DESC')->get();
        return view('admin.speciality.all',compact('all'));
    }

    public function add(){
        return view('admin.speciality.add');
    }

    public function edit($slug){
        $data=Speciality::where('speciality_status',1)->where('speciality_slug',$slug)->firstOrFail();
        return view('admin.speciality.edit',compact('data'));
    }

    public function view($slug){
        $data=Speciality::where('speciality_status',1)->where('speciality_slug',$slug)->firstOrFail();
        return view('admin.speciality.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:specialities,speciality_name'
        ],[
            'name.required'=>'Please enter speciality type!'
        ]);

        $slug=Str::slug($request['name'],'-');
        $insert=Speciality::insert([
            'speciality_name'=>$request['name'],
            'speciality_remarks'=>$request['remarks'],
            'speciality_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/speciality/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/speciality/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>'Please enter speciality type!'
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $update=Speciality::where('speciality_id',$id)->update([
            'speciality_name'=>$request['name'],
            'speciality_remarks'=>$request['remarks'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/speciality/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/speciality/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Speciality::where('speciality_status',1)->where('speciality_id',$id)->update([
            'speciality_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/speciality');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/speciality');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Speciality::where('speciality_status',0)->where('speciality_id',$id)->update([
            'speciality_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/speciality');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/speciality');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Speciality::where('speciality_status',0)->where('speciality_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/speciality');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/speciality');
        }
    }
}
