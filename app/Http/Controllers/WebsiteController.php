<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Contactus;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function apoinmentModal()
    {
        return view('website.ajax-modal.apoinment-modal-body');
    }

    public function getSpeciality()
    {
       return $allSpeciality = Speciality::where('speciality_status',1)->orderBy('speciality_id','DESC')->get();
    }

    public function getDoctor($id)
    {
        return $allDoctor = Doctor::with('SpecialityInfo')->where('status',1)->where('speciality_id', $id)->orderBy('id','DESC')->get();
    }
    public function contact()
    {
        return view('website.contact');
    }

    public function about()
    {
        return view('website.about');
    }

    public function doctors()
    {
        $allDoctor = Doctor::with('SpecialityInfo')->where('status',1)->orderBy('id','DESC')->get();
        return view('website.doctors', compact('allDoctor'));
    }

    public function searchDoctors(Request $request)
    {

        $allDoctor = '';
        if($request->name != '' && $request->specialty !=''){
            $Speciality = Speciality::where('speciality_status',1)->where('speciality_name',$request->specialty)->get();
            if(count($Speciality) > 0){
                $allDoctor = Doctor::with('SpecialityInfo')->where('name','like','%'.$request->name.'%')->where('speciality_id',$Speciality[0]->speciality_id)->where('status',1)->orderBy('id','DESC')->get();
            }else{

                $allDoctor = Doctor::with('SpecialityInfo')->where('name','like','%'.$request->name.'%')->where('status',1)->orderBy('id','DESC')->get();
            }
        }elseif($request->name != ''){
            $allDoctor = Doctor::with('SpecialityInfo')->where('name','like','%'.$request->name.'%')->where('status',1)->orderBy('id','DESC')->get();
        }elseif($request->specialty != ''){
            $Speciality = Speciality::where('speciality_status',1)->where('speciality_name',$request->specialty)->get();
            if(count($Speciality) > 0){
                $allDoctor = Doctor::with('SpecialityInfo')->where('speciality_id',$Speciality[0]->speciality_id)->where('status',1)->orderBy('id','DESC')->get();
            }else{
                $allDoctor = Doctor::with('SpecialityInfo')->where('status',1)->orderBy('id','DESC')->get();
            }
        }else{
            $allDoctor = Doctor::with('SpecialityInfo')->where('status',1)->orderBy('id','DESC')->get();
        }
        return view('website.doctors', compact('allDoctor'));
    }

    public function gallery()
    {
        $allGallery = Gallery::where('gallery_status',1)->orderBy('gallery_id','DESC')->get();
        return view('website.gallery', compact('allGallery'));
    }

    public function store(Request $request)
    {
        $slug=Str::slug($request['name'],'-');
        $insert=Contactus::insert([
            'conus_name' => $request->name,
            'conus_email' => $request->email,
            'conus_phone' => $request->phone,
            'conus_sub' => $request->subject,
            'conus_mess' => $request->details,
            'conus_slug' => $slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            if($request->subject == 'Contact'){
                Session::flash('successContact','value');
                return redirect()->back();
            }elseif($request->subject == 'complain'){
                Session::flash('successComplain','value');
                return redirect()->back();
            }

        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }

    public function storeApoinment(Request $request)
    {
        $slug=Str::slug($request['name'],'-');
        $insert = Appointment::insert([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'patient_status' => $request->patient_status,
            'schedule_date' => $request->date,
            'schedule_time' => $request->time,
            'description' => $request->description,
            'speciality_id' => $request->speciality_id,
            'doctor_id' => $request->doctor_id,
            'slug' => $slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){

                Session::flash('successApoinment','value');
                return redirect()->back();

        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }
}
