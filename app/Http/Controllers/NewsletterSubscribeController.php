<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;
use Carbon\Carbon;
use Session;

class NewsletterSubscribeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=NewsletterSubscriber::where('ns_status',1)->orderBy('ns_id','DESC')->get();
        return view('admin.newsletter-subscribe.all',compact('all'));
    }
}
