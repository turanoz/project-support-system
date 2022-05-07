<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required',
            'soyad' => 'required',
            'eposta' => 'required',
            'sifre' => 'required',
        ]);

        $data = $request->all();
        $user = User::create($data);
        Session::put("user", $user);
        return redirect()->route('projects.index')->with('success', 'Üyelik başarılı bir şekilde oluşturuldu! Hoşgeldin :)');
    }

}
