<?php

namespace App\Http\Controllers;

use Image;
use Session;
use Carbon\Carbon;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NoticeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index(){
        $all = Notice::where('notice_status',1)->orderBy('notice_id','DESC')->get();
        return view('admin.notice.all',compact('all'));
    }

    public function add(){
        return view('admin.notice.add');
    }

    public function edit($id){
        $data = Notice::where('notice_status',1)->where('notice_id',$id)->firstOrFail();
        return view('admin.notice.add', compact('data'));
    }



     public function insert(Request $request){
        $insert = Notice::insertGetId([
            'notice_title_f_word' => $request['ftitle'],
            'notice_title_l_word'=> $request['ltitle'],
            'notice_subtitle'=>$request['subtitle'],
            'notice_img'=>"",
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='notice_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/notice/'.$imageName));

          Notice::where('notice_id',$insert)->update([
              'notice_img'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/notice');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/notice');
        }
    }

    public function update(Request $request, $id){
        $update = Notice::where('notice_status',1)->where('notice_id',$id)->update([
            'notice_title_f_word' => $request['ftitle'],
            'notice_title_l_word'=> $request['ltitle'],
            'notice_subtitle'=>$request['subtitle'],
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='logo_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save(base_path('public/uploads/notice/'.$imageName));

          Notice::where('notice_id',$id)->update([
              'notice_img'=>$imageName
          ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/notice');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/notice');
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft = Notice::where('notice_status',1)->where('notice_id',$id)->update([
            'notice_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/notice');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/notice');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore = Notice::where('notice_status',0)->where('notice_id',$id)->update([
            'notice_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/notice');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/notice');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del = Notice::where('notice_status',0)->where('notice_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/notice');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/notice');
        }
    }
}
