<?php

namespace App\Http\Controllers;

use App\Models\Pesan; 
use Illuminate\Http\Request;

class HomeContactController extends Controller
{
    function index()
    {
        $data = [
            'content' => 'home/contact/index'
        ];

        return view('home.layouts.wrapper', $data);
    }

     function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required'
        ]);

        Pesan::create($data);

        // Redirect dengan pesan sukses
        return redirect('/contact')->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
