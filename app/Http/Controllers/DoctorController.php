<?php

namespace App\Http\Controllers;

use Image;
use Session;
use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\UserRole;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index(){
        $all=Doctor::with('speciality_info')->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.doctor.all',compact('all'));
    }

    public function add(){
        $allSpeciality=Speciality::where('speciality_status',1)->orderBy('speciality_id','DESC')->get();
        return view('admin.doctor.add',compact('allSpeciality'));
    }

    public function edit($user){
        $allSpeciality=Speciality::where('speciality_status',1)->orderBy('speciality_id','DESC')->get();
        $data=Doctor::with('speciality_info')->where('status',1)->where('username',$user)->firstOrFail();
        return view('admin.doctor.edit',compact('data','allSpeciality'));
    }

    public function view($user){
        $data=Doctor::with('speciality_info')->where('status',1)->where('username',$user)->firstOrFail();
        return view('admin.doctor.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'phone'=>'string|max:20',
            'degree'=>'required|string|max:255',
            'specialties'=>'required|string|max:255',
            'branch'=>'required|string|max:255',
            'practice_days'=>'required|string|max:255',
            'username'=>'required|string|max:20|unique:users',
            'email'=>'required|string|email|max:255|unique:users',
            'pic' => 'image|mimes:jpg,png,jpeg,gif,svg',
        ],[
            'name.required'=>'Please enter name!',
            'username.required'=>'Please enter username!',
            'email.required'=>'Please enter email address!',
        ]);

        $insert=Doctor::insertGetId([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'username'=>$request['username'],
            'email'=>$request['email'],
            'degree' =>$request['degree'],
            'speciality_id' =>$request['specialties'],
            'branch' =>$request['branch'],
            'practice_days' =>$request['practice_days'],
            'photo'=>'',
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='user_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save(base_path('public/uploads/doctors/'.$imageName));

            Doctor::where('id',$insert)->update([
                'photo'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }
        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/doctor/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/doctor/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'phone'=>'string|max:20',
            'degree'=>'required|string|max:255',
            'specialties'=>'required|string|max:255',
            'branch'=>'required|string|max:255',
            'practice_days'=>'required|string|max:255',
            'username'=>'required|string|max:20|unique:users',
            'email'=>'required|string|email|max:255|unique:users',
        ],[
            'name.required'=>'Please enter name!',
            'username.required'=>'Please enter username!',
            'email.required'=>'Please enter email address!',
        ]);

        $user=$request['user'];
        $id=$request['id'];
        $update=Doctor::where('status',1)->where('username',$user)->update([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'username'=>$request['username'],
            'email'=>$request['email'],
            'degree' =>$request['degree'],
            'speciality_id' =>$request['specialties'],
            'branch' =>$request['branch'],
            'practice_days' =>$request['practice_days'],
            'photo'=>'',
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='user_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save(base_path('public/uploads/doctors/'.$imageName));

            Doctor::where('id',$id)->update([
                'photo'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/doctor/view/'.$user);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/doctor/edit/'.$user);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Doctor::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/doctor');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/doctor');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Doctor::where('status',0)->where('id',$id)->update([
            'status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/doctor');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/doctor');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Doctor::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/doctor');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/doctor');
        }
    }

    public function allprint(){
        $all = Doctor::with('speciality_info')->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.doctor.allprint',compact('all'));
    }

    public function print($slug){
        $data=Doctor::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.doctor.print',compact('data'));
    }

    public function export(){
        return Excel::download(new ContactExport, 'doctor.xlsx');
    }

    public function pdf(){
        $all=Doctor::where('status',1)->orderBy('id','DESC')->get();
        $pdf=PDF::loadView('admin.doctor.pdf', compact('all'));
        return $pdf->download('doctor.pdf');
    }
}
