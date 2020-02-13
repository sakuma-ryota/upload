<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //以下にActionを追加
    //また、formの送信先(<form action=”この部分”>)を、 
    //Admin\ProfileController の create Action に指定してください。
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create()
    {
        return redirect('admin/profile/create');
        return view('admin/profile/create');
    }
    public function edit()
    {
        return view('admin.profile.edit');
    }
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}


