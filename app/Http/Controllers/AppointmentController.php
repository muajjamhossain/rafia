<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use Session;
use Carbon\Carbon;
use App\Models\Contactus;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ContactExport;
use Maatwebsite\Excel\Facades\Excel;

class AppointmentController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Appointment::with('speciality_info', 'doctorInfo')->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.appointment.all',compact('all'));
    }

    public function view($slug){
        $data=Appointment::with('speciality_info', 'doctorInfo')->where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.appointment.view',compact('data'));
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Appointment::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/appointment');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/appointment');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Appointment::where('status',0)->where('id',$id)->update([
            'status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/appointment');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/appointment');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Appointment::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/appointment');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/appointment');
        }
    }

    public function allprint(){
        $all = Appointment::with('speciality_info', 'doctorInfo')->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.appointment.allprint',compact('all'));
    }

    public function print($slug){
        $data=Appointment::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.appointment.print',compact('data'));
    }

    public function export(){
        return Excel::download(new ContactExport, 'appointment.xlsx');
    }

    public function pdf(){
        $all=Appointment::where('status',1)->orderBy('id','DESC')->get();
        $pdf=PDF::loadView('admin.appointment.pdf', compact('all'));
        return $pdf->download('appointment.pdf');
    }
}
