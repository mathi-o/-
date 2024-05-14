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
    public function upload(UploadRequest $request)
    {
        $datum = $request->validated();
//ddd($datum);


        $image_path = $request ->file('photo')->store('public/avatar/');

        $r = Entry::create($datum);
        $r->photo = $image_path;

        return redirect()->route('record')->with('success','追加に成功しました！');

    }
}
