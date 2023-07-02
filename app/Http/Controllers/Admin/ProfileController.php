<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下の1行を追記することで、Profile Modelが扱えるようになる
use App\Models\Profile;
// 以下を追記
use App\Models\History;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //課題で追記
     public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        //if (isset($form['image'])) {
            //$path = $request->file('image')->store('public/image');
            //$news->image_path = basename($path);
        //} else {
        //    $news->image_path = null;
        //}

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        //unset($form['image']);

        // データベースに保存する
        $profile->fill($form);
        $profile->save();

        return redirect('admin/profile/create');
    }

   public function edit(Request $request)
    {
        //dd('OK');
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        //dd($profile);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);

        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        //課題で追記
        $history = new History();
        $history->profile_id = $profile->id;
        $history->news_id = 0;//エラー解消のための応急処置
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/profile');
    }
}
