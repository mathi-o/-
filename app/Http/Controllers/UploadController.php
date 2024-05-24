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

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        Log::info('Uploading file: ' . $file->getClientOriginalName());
        $path = Storage::disk('s3')->put('uploads', $file, 'public');
        if ($path) {
            Log::info('File uploaded to S3: ' . $path);
        } else {
            Log::error('File upload to S3 failed.');
        }
        $datum['photo'] = $path;
    } else {
        Log::error('No file found in the request.');
    }

    $datum['prefecture'] = $name;
    $r = Entry::create($datum);

    $request->session()->flash('front.task_upload_success', true);
    return redirect()->route('record', ['name' => $name]);
    }
}


//"https://38fbb47958c0424b875ee9cb7ea5f32a.vfs.cloud9.ap-northeast-1.amazonaws.com/storage/avatar/3FJCSF0XFEF2sKaD86ueUHkW3VNyTqmJbphAZMW5.jpg"
