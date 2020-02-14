<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//以下の追記で、Profile Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{
    //以下にActionを追加

    public function add()
    {
        return view('admin.profile.create');
    }
    public function create(Request $request) {
        //Varidationを行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        //データベースに保存する
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
        return view('admin/profile/create');
    }
    public function edit() {
        return view('admin.profile.edit');
    }
    public function update() {
        return redirect('admin/profile/edit');
    }
}


