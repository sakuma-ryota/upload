<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//以下の追記で、Profile Modelが扱えるようになる
use App\Profile;

use App\ProfileHistory;

use Carbon\Carbon;

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
    }
    //indexの追加
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を習得する
            $posts = Profile::where('name', $cond_title)->get();
        } else {
            // それ以外は検索結果を習得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);

        if (empty($profile)) {
            abort(404);
        }

        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    //データ更新アクション
    public function update(Request $request)
    {
        //validtationをかける
        $this->validate($request, Profile::$rules);
        //Profile Modelからデータを格納する
        $profile = Profile::find($request->id);
        //送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        
        unset($profile_form['_token']);
        unset($profile_form['remove']);
        //該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        //編集履歴追加
        $history = new ProfileHistory;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile');
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


