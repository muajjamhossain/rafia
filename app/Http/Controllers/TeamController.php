<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Team;
use Carbon\Carbon;
use Session;
use Image;

class TeamController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Team::where('team_status',1)->orderBy('team_id','DESC')->get();
        return view('admin.team.all',compact('all'));
    }

    public function add(){
        return view('admin.team.add');
    }

    public function edit($slug){
        $data=Team::where('team_status',1)->where('team_slug',$slug)->firstOrFail();
        return view('admin.team.edit',compact('data'));
    }

    public function view($slug){
        $data=Team::where('team_status',1)->where('team_slug',$slug)->firstOrFail();
        return view('admin.team.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'details'=>'required',
            'pic'=>'required',
        ],[
            'name.required'=>'Please enter team member name!',
            'designation.required'=>'Please enter team member designation!',
            'details.required'=>'Please enter team member details!',
            'pic.required'=>'Please enter team member details!',
        ]);

        $slug=uniqid('T');
        $insert=Team::insertGetId([
            'team_name'=>$request['name'],
            'team_designation'=>$request['designation'],
            'team_details'=>$request['details'],
            'team_facebook'=>$request['facebook'],
            'team_twitter'=>$request['twitter'],
            'team_linkedin'=>$request['linkedin'],
            'team_pinterest'=>$request['pinterest'],
            'team_google'=>$request['google'],
            'team_youtube'=>$request['youtube'],
            'team_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='team_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/team/'.$imageName);

          Team::where('team_id',$insert)->update([
              'team_photo'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success');
            return redirect('dashboard/team/add');
        }else{
            Session::flash('error');
            return redirect('dashboard/team/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'details'=>'required',
        ],[
            'name.required'=>'Please enter team member name!',
            'designation.required'=>'Please enter team member designation!',
            'details.required'=>'Please enter team member details!',
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $insert=Team::where('team_status',1)->where('team_id',$id)->update([
            'team_name'=>$request['name'],
            'team_designation'=>$request['designation'],
            'team_details'=>$request['details'],
            'team_facebook'=>$request['facebook'],
            'team_twitter'=>$request['twitter'],
            'team_linkedin'=>$request['linkedin'],
            'team_pinterest'=>$request['pinterest'],
            'team_google'=>$request['google'],
            'team_youtube'=>$request['youtube'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='team_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/team/'.$imageName);

          Team::where('team_id',$id)->update([
              'team_photo'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success');
            return redirect('dashboard/team/edit/'.$slug);
        }else{
            Session::flash('error');
            return redirect('dashboard/team/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Team::where('team_status',1)->where('team_id',$id)->update([
            'team_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/team');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/team');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Team::where('team_status',0)->where('team_id',$id)->update([
            'team_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/team');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/team');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Team::where('team_status',0)->where('team_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/team');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/team');
        }
    }
}
