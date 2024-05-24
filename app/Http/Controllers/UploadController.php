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

        try {
        // S3にアップロード
            $image_path = $request->file('photo')->store('avatar', 's3');
            
            if ($image_path === false) {
            // ファイルのアップロードに失敗した場合の処理
            return redirect()->back()->withErrors(['photo' => 'ファイルのアップロードに失敗しました。']);
        }

        // S3のURLを取得
        $datum['photo'] = Storage::disk('s3')->url($image_path);
        } catch (\Exception $e) {
            Log::error('File upload error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['photo' => 'ファイルのアップロード中にエラーが発生しました。']);
        }

        $datum['prefecture'] = $name;
        $r = Entry::create($datum);

        $request->session()->flash('front.task_upload_success', true);
        return redirect()->route('record', ['name' => $name]);

 }
}


//"https://38fbb47958c0424b875ee9cb7ea5f32a.vfs.cloud9.ap-northeast-1.amazonaws.com/storage/avatar/3FJCSF0XFEF2sKaD86ueUHkW3VNyTqmJbphAZMW5.jpg"
