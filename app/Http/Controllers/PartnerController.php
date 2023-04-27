<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Partner;
use Carbon\Carbon;
use Session;
use Image;

class PartnerController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Partner::where('partner_status',1)->orderBy('partner_id','DESC')->get();
        return view('admin.partner.all',compact('all'));
    }

    public function add(){
        return view('admin.partner.add');
    }

    public function view($slug){
        $data=Partner::where('partner_status',1)->where('partner_slug',$slug)->firstOrFail();
        return view('admin.partner.view',compact('data'));
    }

    public function edit($slug){
        $data=Partner::where('partner_status',1)->where('partner_slug',$slug)->firstOrFail();
        return view('admin.partner.edit',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'url'=>'required',
            'pic'=>'required',
        ],[
            'title.required'=>'Please enter partner title!',
            'url.required'=>'Please enter partner url!',
            'pic.required'=>'Please upload partner logo!',
        ]);
        $slug='P'.uniqid(20);
        $insert=Partner::insertGetId([
            'partner_title'=>$_POST['title'],
            'partner_url'=>$_POST['url'],
            'partner_logo'=>'',
            'partner_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='partner_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/partner/'.$imageName);

          Partner::where('partner_id',$insert)->update([
              'partner_logo'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/partner/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/partner/add');
        }
    }

    public function update(Request $request){
       $this->validate($request,[
            'title'=>'required',
            'url'=>'required',
        ],[
            'title.required'=>'Please enter partner title!',
            'url.required'=>'Please enter partner url!',
        ]);
        $slug=$_POST['slug'];
        $id=$_POST['id'];
        $update=Partner::where('partner_slug',$slug)->update([
            'partner_title'=>$_POST['title'],
            'partner_url'=>$_POST['url'],
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='partner_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/partner/'.$imageName));

          Partner::where('partner_slug',$slug)->update([
              'partner_logo'=>$imageName
          ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/partner/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/partner/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Partner::where('partner_status',1)->where('partner_id',$id)->update([
            'partner_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/partner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/partner');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Partner::where('partner_status',0)->where('partner_id',$id)->update([
            'partner_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/partner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/partner');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Partner::where('partner_status',0)->where('partner_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/partner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/partner');
        }
    }
}
