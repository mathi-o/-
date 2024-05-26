<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Http\Requests\UploadRequest;
use App\Http\Requests\EditSaveRequest;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    //
    public function record($name)
    {
        $list = Entry::where('user_id',Auth::id())
                            ->where('prefecture',$name)
                            ->get();
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $places = Entry::where('prefecture',$name)->get();
        //dd($apiKey);
        return view('record.record',compact('list','name','apiKey','places'));
    }

    public function getEntry($id)
    {
        $record = Entry::find($id);
        //dd($record);
        if($record === null){
            return null;
        }
        if($record->user_id !== Auth::id()){
            return null;
        }
        return $record;
    }


    public function EntryRender($name,$id,$template_name,)
    {
        $record = $this->getEntry($id);

        if($record === null){
            return redirect(route('record',['name'=>$name]));
        }

        return view($template_name,compact('record','name'));
    }



    public function edit($name,$id)
    {
        $record = $this->getEntry($id);

        if($record === null){
            return redirect(route('record',['name'=>$name]));
        }

        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $places = Entry::where('prefecture',$name)->get();
//dd($name,$id,$apiKey,$places);
        return view('record.edit',compact('record','name','apiKey','places'));

    }

    public function editSave($name,$id,EditSaveRequest $request)
    {
        $datum = $request->validated();
        $record = $this->getEntry($id);
    //dd($datum,$record);
        if($record === null){
            return redirect(route('record',compact('name')));
        }
        $record->date = $datum['date'];
        $record->location = $datum['location'];
        $record->title = $datum['title'];

        if ($request-> hasFile('photo')){
            $image_path = $request ->file('photo')->store('public/avatar');
            $result = substr($image_path, strpos($image_path, "/") + 1);
            $datum['photo'] = $result;
            $record->photo = $datum['photo'];
        }
        $record->impression = $datum['impression'];
        $record->latitude = $datum['latitude'];
        $record->longitude = $datum['longitude'];

        $record->save();
        $request-> session() ->flash('front.task_editSave_success',true);
        return redirect(route('record',compact('name')));

    }

    public function delete($name,$id,Request $request)
    {
        $record = $this->getEntry($id);
        if($record !== null){
            $record ->delete();
            $request -> session() -> flash('front.task_delete_success',true);
        }


        return redirect(route('record',compact('name')));
    }

    /*public function mapMarker($name){
        $places = Entry::where('prefecture',$name)->get();
        $apiKey = config('services.google.maps_api_key');
ddd($places,$apiKey);

        return view('record.record',compact('name','places','apiKey'));
    }*/

}
