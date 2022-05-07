<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Session::get("user")) {
            return redirect()->route("projects.me");
        } else {
            return view("pages.login");

        }
    }

    public function signin(Request $request)
    {
        $eposta = $request->eposta;
        $sifre = $request->sifre;


        $data = User::whereEposta($eposta)->whereSifre($sifre)->first();

        if ($data) {
            Session::put("user", $data);
            return redirect()->route("projects.index")->with("success", "Hoşgeldiniz " . $data->ad . " " . $data->soyad . ".");
        } else {
            return redirect()->route("auth.login")->with("error", "Kullanıcı adı veya şifre yanlış!");
        }
    }

    public function signout()
    {
        Session::remove("user");
        return redirect()->route("auth.login");
    }
}
