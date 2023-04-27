<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\PageContent;
use Carbon\Carbon;
use Session;

class PageController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Page::where('page_status',1)->orderBy('page_id','ASC')->get();
        return view('admin.page.all',compact('all'));
    }
}
