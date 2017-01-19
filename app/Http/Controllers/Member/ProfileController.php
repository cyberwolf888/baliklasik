<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $member = $user->member;
        return view('member.profile.index',[
            'user'=>$user,
            'member'=>$member
        ]);
    }

    public function personal(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'no_hp' => 'required|max:255|alpha_num|min:6',
            'alamat' => 'required|max:255'
        ]);
        $user = Auth::user();
        $member = $user->member;
        $member->nama = $request->nama;
        $member->no_hp = $request->no_hp;
        $member->alamat = $request->alamat;
        $member->save();

        $user->name = $request->nama;
        $user->save();

        return redirect()->back();
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back();
    }
}
