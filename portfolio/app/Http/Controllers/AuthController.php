<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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
}
