<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecycleController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index(){
        return view('admin.recycle.index');
    }

    public function user(){
        return view('admin.recycle.user');
    }

    public function banner(){
        return view('admin.recycle.banner');
    }

    public function contactus(){
        return view('admin.recycle.contact');
    }

    public function service(){
        return view('admin.recycle.service');
    }

    public function video(){
        return view('admin.recycle.video');
    }

    public function event(){
        return view('admin.recycle.event');
    }

    public function team(){
        return view('admin.recycle.team');
    }

    public function partner(){
        return view('admin.recycle.partner');
    }

    public function client(){
        return view('admin.recycle.client');
    }

    public function gallery(){
        return view('admin.recycle.gallery');
    }

    public function gallery_category(){
        return view('admin.recycle.gallery-category');
    }

    public function testimonial(){
        return view('admin.recycle.testimonial');
    }

    public function faq(){
        return view('admin.recycle.faq');
    }

    public function post(){
        return view('admin.recycle.post');
    }

    public function blog_category(){
        return view('admin.recycle.blog-category');
    }

    public function tag(){
        return view('admin.recycle.tag');
    }

}
