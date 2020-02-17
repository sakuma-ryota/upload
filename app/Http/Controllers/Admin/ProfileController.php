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
    public function create(Request $request)
    {
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
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    //データ更新アクション
    public function update(Request $request)
    {
        //validtationをかける
        $this->validtate($request, Profile::$rules);
        //Profile Modelからデータを格納する
        $profile = Profile::find($request->id);
        //送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);
        //該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        return redirect('admin/profile/edit');
    }
    //データの削除アクション
    public function delete(Request $request)
    {
        //該当するProfile Modelを習得
        $profile = Profile::find($request->id);
        //削除する
        $profile->delete();
        return redirect('admin/profile/');
    }
}


