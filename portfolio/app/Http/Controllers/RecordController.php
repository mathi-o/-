<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class RecordController extends Controller
{
    //
    public function record($name)
    {
        $list = Entry::where('prefecture',$name)
                        ->get();
        //dd($list);
        return view('record.record',compact('list','name'));
    }

    public function delete($name)
    {


        return redirect(route('record',compact('name')));
    }





}
