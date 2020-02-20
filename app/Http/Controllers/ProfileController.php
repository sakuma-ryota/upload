<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
      $posts = Profile::all()->sortByDesc('updata_at');
      if (count($posts) > 0) {
        $headline = $posts->shift();
      } else {
        $headline = null;
      }
      //profile/index.blade.php に渡している
      // またView テンプレートに headline, posts という変数を渡している
      return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
