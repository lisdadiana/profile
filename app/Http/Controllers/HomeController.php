<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Banner;

class HomeController extends Controller
{
    //
    function index()
    {
        $data = [
            'about'    => About::first(),
            'services'    => Service::limit(4)->get(),
            'blog'    => Blog::limit(4)->get(),
            'banner'    => Banner::get(),
            'content' => 'home/home/index'
        ];
       return view('home.layouts.wrapper', $data);

    }

    function about()
    {
        $data = [
            'about'    => About::first(),
            'content' => 'home/about/index'
        ];
       return view('home.layouts.wrapper', $data);

    }

    function service()
    {
        $data = [
            'services'    => Service::get(),
            'content' => 'home/services/index'
        ];
       return view('home.layouts.wrapper', $data);

    }

}
