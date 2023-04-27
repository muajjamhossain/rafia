<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ContactExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Auth;
use App\Models\Contactus;
use Carbon\Carbon;
use Session;
use PDF;

class ComplainController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Contactus::where('conus_status',1)->where('conus_sub','Complain')->orderBy('conus_id','DESC')->get();
        return view('admin.complain.all',compact('all'));
    }

    public function view($slug){
        $data=Contactus::where('conus_status',1)->where('conus_sub','Complain')->where('conus_slug',$slug)->firstOrFail();
        return view('admin.complain.view',compact('data'));
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Contactus::where('conus_status',1)->where('conus_sub','Complain')->where('conus_id',$id)->update([
            'conus_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/contactus');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/contactus');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Contactus::where('conus_status',0)->where('conus_id',$id)->update([
            'conus_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/contactus');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/contactus');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Contactus::where('conus_status',0)->where('conus_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/contactus');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/contactus');
        }
    }

    public function allprint(){
        $all=Contactus::where('conus_status',1)->where('conus_sub','Complain')->orderBy('conus_id','DESC')->get();
        return view('admin.complain.allprint',compact('all'));
    }

    public function print($slug){
        $data=Contactus::where('conus_status',1)->where('conus_sub','Complain')->where('conus_slug',$slug)->firstOrFail();
        return view('admin.complain.print',compact('data'));
    }

    public function export(){
        return Excel::download(new ContactExport, 'contact.xlsx');
    }

    public function pdf(){
        $all=Contactus::where('conus_status',1)->where('conus_sub','Complain')->orderBy('conus_id','DESC')->get();
        $pdf=PDF::loadView('admin.complain.pdf', compact('all'));
        return $pdf->download('contact.pdf');
    }
}
