<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    protected $hokkaidou = [
        '北海道'
        ];

    protected $touhoku = [
        '青森', '岩手', '宮城', '秋田', '山形', '福島'
        ];

    protected $kanntou =[
        '茨城', '栃木', '群馬', '埼玉', '千葉', '東京', '神奈川'
        ];

    protected $tyuubu = [
        '新潟', '富山', '石川', '福井', '山梨', '長野', '岐阜',
        '静岡', '愛知'
        ];

    protected $kinnki = [
        '三重', '滋賀', '京都', '大阪', '兵庫','奈良', '和歌山'
        ];


    protected $tyuugoku = [
        '鳥取', '島根', '岡山', '広島', '山口'
        ];

    protected $sikoku = [
        '徳島', '香川', '愛媛', '高知'
        ];

    protected $kyusyu = [
        '福岡', '佐賀', '長崎','熊本', '大分', '宮崎', '鹿児島', '沖縄'
        ];


    public function top()
    {

        return view('top',['hokkaidou'=>$this->hokkaidou,'touhoku'=>$this->touhoku,'kanntou'=>$this->kanntou,'tyuubu'=>$this->tyuubu,'kinnki'=>$this->kinnki,'tyuugoku'=>$this->tyuugoku,'sikoku'=>$this->sikoku,'kyusyu'=>$this->kyusyu,]);
    }
}
