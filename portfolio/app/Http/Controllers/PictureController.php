<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class PictureController extends Controller
{
    //
    public function picture(){
        $record = Entry::orderBy('prefecture')
                        ->get();

        return view ('picture_list',compact('record'));
    }
}
