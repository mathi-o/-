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
//ddd($datum);
        $datum['user_id'] = Auth::id();

        $image_path = $request ->file('photo')->store('public/avatar');
        $result = substr($image_path, strpos($image_path, "/") + 1);
        $path = Storage::disk('s3')->put('/',$result,'public');
        $datum['photo'] = $path;

        $datum['prefecture'] = $name;
        ddd($datum);
        $r = Entry::create($datum);

        $request -> session() -> flash('front.task_upload_success',true);
        return redirect()->route('record', ['name' => $name]);

 }
}


//"https://38fbb47958c0424b875ee9cb7ea5f32a.vfs.cloud9.ap-northeast-1.amazonaws.com/storage/avatar/3FJCSF0XFEF2sKaD86ueUHkW3VNyTqmJbphAZMW5.jpg"
