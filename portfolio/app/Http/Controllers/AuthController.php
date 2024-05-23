<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view ('index');

    }
    public function login(LoginRequest $request)
    {
        $datum = $request->validated();
        if(Auth::attempt($datum) === false)
        {
            return back()
                    ->withInput()
                    ->withErrors(['auth'=>'emailかpasswordに誤りがあります。']);
        }
        $request->session()->regenerate();
        return redirect()->intended('/top');
    }



    public function logout(Request $request){
        Auth::logout();
        $request -> session() -> regenerateToken();
        $request -> session() -> regenerate();

        return redirect(route('front.index'));
    }

    public function HowTo(){
        return view('HowTo');
    }
}
