<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    //
     public function upload(UploadRequest $request,$name)
    {

        $datum = $request->validated();
    $datum['user_id'] = Auth::id();

    // ファイルアップロード処理
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $path = Storage::disk('s3')->put('photos', $file, 'public');
        if (!$path) {
            return back()->with('error', 'ファイルのアップロードに失敗しました。');
        }
        $URLPath = Storage::disk('s3')->url($path);
        $datum['photo'] = $URLPath;
    } else {
        return back()->with('error', '写真がアップロードされていません。');
    }

    $datum['prefecture'] = $name;

    // データベースにエントリを作成
    $r = Entry::create($datum);

    // 成功メッセージをセッションに設定
    $request->session()->flash('front.task_upload_success', true);

    return redirect()->route('record', ['name' => $name]);

 }

}

