<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Page;
use App\PageContent;
use Carbon\Carbon;
use Session;
use Image;

class PageContentController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=PageContent::where('pc_status',1)->orderBy('pc_id','ASC')->get();
        return view('admin.page-content.all',compact('all'));
    }

    public function edit($slug){
        $data=PageContent::where('pc_status',1)->where('pc_slug',$slug)->firstOrFail();
        return view('admin.page-content.edit',compact('data'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required|max:190',
        ],[
            'title.required'=>'Please enter page content title!',
        ]);
        $id=$request['id'];
        $slug=$request['slug'];
        $update=PageContent::where('pc_status',1)->where('pc_id',$id)->update([
            'pc_title'=>$request['title'],
            'pc_subtitle'=>$request['subtitle'],
            'pc_details'=>$request['details'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='image_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->save('uploads/page-content/'.$imageName);

          PageContent::where('pc_id',1)->update([
              'pc_photo'=>$imageName
          ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/page/content/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/page/content/edit/'.$slug);
        }
    }
}
