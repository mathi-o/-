<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user_register.index');
    }



    public function register(RegisterRequest $request)
    {
        $datum = $request -> validated();
        $datum['password'] = Hash::make($datum['password']);
        $r = User::create($datum);
        $request -> session() -> flash('front.task_register_success',true);
        return redirect(route('front.index'));
    }
}
