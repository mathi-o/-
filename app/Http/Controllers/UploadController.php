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

        $datum = $request -> validated();
        $datum['user_id'] = Auth::id();

        $file = $request->file('photo');
        $path = Storage::disk('s3')->put('/', $file, 'public');
        $URLpath = Storage::disk('s3')->url($path);
        $datum['photo'] = $URLpath;
        $datum['prefecture'] = $name;
        $r = Entry::create($datum);

        $request -> session() -> flash('front.task_upload_success',true);
        return redirect()->route('record', ['name' => $name]);

 }

}

