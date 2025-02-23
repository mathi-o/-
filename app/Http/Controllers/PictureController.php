<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    //

    protected $prefectures = [
        '北海道', '青森', '岩手', '宮城', '秋田', '山形', '福島',
        '茨城', '栃木', '群馬', '埼玉', '千葉', '東京', '神奈川',
        '新潟', '富山', '石川', '福井', '山梨', '長野', '岐阜',
        '静岡', '愛知', '三重', '滋賀', '京都', '大阪', '兵庫',
        '奈良', '和歌山', '鳥取', '島根', '岡山', '広島', '山口',
        '徳島', '香川', '愛媛', '高知', '福岡', '佐賀', '長崎',
        '熊本', '大分', '宮崎', '鹿児島', '沖縄'
    ];


    public function picture(Request $request){
        $query = Entry::where('user_id',Auth::id());

        if($request->filled('prefecture')){
            $query -> where('prefecture',$request->prefecture);
        }

        if($request->order == 'date_asc'){
            $query -> orderBy('created_at','ASC');
        }

        if($request->order == 'date_desc'){
            $query -> orderBy('created_at','DESC');
        }

        $record = $query->get();

        $sortRecord = $record->sortBy(function($entry){
                           return array_search($entry->prefecture,$this->prefectures);
                        });

        return view ('picture_list',['sortRecord'=>$sortRecord,'prefectures'=>$this->prefectures]);
    }
}
