<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Client;
use Carbon\Carbon;
use Session;
use Image;

class ClientController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Client::where('client_status',1)->orderBy('client_id','DESC')->get();
        return view('admin.client.all',compact('all'));
    }

    public function add(){
        return view('admin.client.add');
    }

    public function view($slug){
        $data=Client::where('client_status',1)->where('client_slug',$slug)->firstOrFail();
        return view('admin.client.view',compact('data'));
    }

    public function edit($slug){
        $data=Client::where('client_status',1)->where('client_slug',$slug)->firstOrFail();
        return view('admin.client.edit',compact('data'));
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
        $slug='C'.uniqid(20);
        $insert=Client::insertGetId([
            'client_title'=>$_POST['title'],
            'client_url'=>$_POST['url'],
            'client_logo'=>'',
            'client_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='client_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/client/'.$imageName);

          Client::where('client_id',$insert)->update([
              'client_logo'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/client/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/client/add');
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
        $update=Client::where('client_slug',$slug)->update([
            'client_title'=>$_POST['title'],
            'client_url'=>$_POST['url'],
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='client_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/client/'.$imageName));

          Client::where('client_slug',$slug)->update([
              'client_logo'=>$imageName
          ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/client/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/client/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Client::where('client_status',1)->where('client_id',$id)->update([
            'client_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/client');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/client');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Client::where('client_status',0)->where('client_id',$id)->update([
            'client_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/client');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/client');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Client::where('client_status',0)->where('client_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/client');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/client');
        }
    }
}
