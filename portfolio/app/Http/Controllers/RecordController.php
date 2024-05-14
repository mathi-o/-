<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class RecordController extends Controller
{
    //
    public function record()
    {
        $list = Entry::all();
        //dd($list);
        return view('record.record',compact('list'));
    }


}
