<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Faq;
use Carbon\Carbon;
use Session;
use Image;

class FaqController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Faq::where('faq_status',1)->orderBy('faq_id','ASC')->get();
        return view('admin.faq.all',compact('all'));
    }

    public function add(){
        return view('admin.faq.add');
    }

    public function edit($slug){
        $data=Faq::where('faq_status',1)->where('faq_slug',$slug)->firstOrFail();
        return view('admin.faq.edit',compact('data'));
    }

    public function view($slug){
        $data=Faq::where('faq_status',1)->where('faq_slug',$slug)->firstOrFail();
        return view('admin.faq.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'question'=>'required',
            'answer'=>'required',
        ],[
            'question.required'=>'Please enter faq question!',
            'answer.required'=>'Please enter faq answer!',
        ]);
        $slug='Q'.uniqid(20);
        $insert=Faq::insertGetId([
            'faq_question'=>$_POST['question'],
            'faq_answer'=>$_POST['answer'],
            'faq_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/faq/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/faq/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'question'=>'required',
            'answer'=>'required',
        ],[
            'question.required'=>'Please enter faq question!',
            'answer.required'=>'Please enter faq answer!',
        ]);
        $id=$request['id'];
        $slug=$request['slug'];
        $insert=Faq::where('faq_id',$id)->update([
            'faq_question'=>$_POST['question'],
            'faq_answer'=>$_POST['answer'],
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/faq/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/faq/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Faq::where('faq_status',1)->where('faq_id',$id)->update([
            'faq_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/faq');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/faq');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Faq::where('faq_status',0)->where('faq_id',$id)->update([
            'faq_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/faq');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/faq');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Faq::where('faq_status',0)->where('faq_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/faq');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/faq');
        }
    }
}
