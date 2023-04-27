<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Testimonial;
use Carbon\Carbon;
use Session;
use Image;

class TestimonialController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Testimonial::where('tm_status',1)->orderBy('tm_id','ASC')->get();
        return view('admin.testimonial.all',compact('all'));
    }

    public function add(){
        return view('admin.testimonial.add');
    }

    public function edit($slug){
        $data=Testimonial::where('tm_status',1)->where('tm_slug',$slug)->firstOrFail();
        return view('admin.testimonial.edit',compact('data'));
    }

    public function view($slug){
        $data=Testimonial::where('tm_status',1)->where('tm_slug',$slug)->firstOrFail();
        return view('admin.testimonial.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'designation'=>'required',
            'company'=>'required',
            'review'=>'required',
            'pic'=>'required',
        ],[
            'name.required'=>'Please enter client Name!',
            'designation.required'=>'Please enter client designation!',
            'company.required'=>'Please enter company/organization!',
            'review.required'=>'Please enter client review!',
            'pic.required'=>'Please upload image!',
        ]);
        $slug=uniqid('T');
        $insert=Testimonial::insertGetId([
            'tm_name'=>$request['name'],
            'tm_designation'=>$request['designation'],
            'tm_company'=>$request['company'],
            'tm_review'=>$request['review'],
            'tm_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='client'.'_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/testimonial/'.$imageName);

          Testimonial::where('tm_id',$insert)->update([
              'tm_image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success');
            return redirect('dashboard/testimonial/add');
        }else{
            Session::flash('error');
            return redirect('dashboard/testimonial/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'designation'=>'required',
            'company'=>'required',
            'review'=>'required',
        ],[
            'name.required'=>'Please enter client Name!',
            'designation.required'=>'Please enter client designation!',
            'company.required'=>'Please enter company/organization!',
            'review.required'=>'Please enter client review!',
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $update=Testimonial::where('tm_status',1)->where('tm_id',$id)->update([
            'tm_name'=>$request['name'],
            'tm_designation'=>$request['designation'],
            'tm_company'=>$request['company'],
            'tm_review'=>$request['review'],
            'tm_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='client'.'_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/testimonial/'.$imageName);

          Testimonial::where('tm_id',$id)->update([
              'tm_image'=>$imageName
          ]);
        }

        if($request->hasFile('logo')){
          $logo=$request->file('logo');
          $logoName='client_logo'.'_'.$id.'_'.time().'.'.$logo->getClientOriginalExtension();
          Image::make($logo)->save('uploads/testimonial/'.$logoName);

          Testimonial::where('tm_id',$id)->update([
              'tm_logo'=>$logoName
          ]);
        }

        if($update){
            Session::flash('success');
            return redirect('dashboard/testimonial/edit/'.$slug);
        }else{
            Session::flash('error');
            return redirect('dashboard/testimonial/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Testimonial::where('tm_status',1)->where('tm_id',$id)->update([
            'tm_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/testimonial');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/testimonial');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Testimonial::where('tm_status',0)->where('tm_id',$id)->update([
            'tm_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/testimonial');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/testimonial');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Testimonial::where('tm_status',0)->where('tm_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/testimonial');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/testimonial');
        }
    }
}
