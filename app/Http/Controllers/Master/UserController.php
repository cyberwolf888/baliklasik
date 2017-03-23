<?php

namespace App\Http\Controllers\Master;

use App\Models\Member;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function member_index()
    {
        $model = Member::with('user')->get();
        return view('admin/user/member',[
            'model'=>$model
        ]);
    }


    public function member_create()
    {
        $model = new Member();
        $user = new User();
        return view('admin/user/member_form',[
            'model'=>$model,
            'user'=>$user
        ]);
    }


    public function member_store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:50|unique:users',
            'password' => 'required|min:6|confirmed',
            'no_hp' => 'required|max:255|alpha_num|min:6',
            'alamat' => 'required|max:255'
        ]);


        $member = new Member();
        $user = new User();

        $user->name = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request['password']);
        $user->status = $request->status;
        $user->type = 2;
        $user->save();
        $user->attachRole(2);

        $member->user_id = $user->id;
        $member->nama = $request->nama;
        $member->no_hp = $request->no_hp;
        $member->alamat = $request->alamat;
        $member->save();

        return redirect()->route('admin.user.member.manage');
    }


    public function member_show($id)
    {
        //
    }


    public function member_edit($id)
    {
        $model = Member::findOrFail($id);
        $user = $model->user;
        return view('admin/user/member_form',[
            'model'=>$model,
            'user'=>$user,
            'update'=>1
        ]);
    }

    public function member_update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'username' => 'required|max:50',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            'no_hp' => 'required|max:255|alpha_num|min:6',
            'alamat' => 'required|max:255'
        ]);


        $member = Member::findOrFail($id);
        $user = $member->user;

        $user->name = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request['password']);
        $user->status = $request->status;
        $user->type = 2;
        $user->save();

        $member->nama = $request->nama;
        $member->no_hp = $request->no_hp;
        $member->alamat = $request->alamat;
        $member->save();

        return redirect()->route('admin.user.member.manage');
    }


    public function member_destroy($id)
    {
        $member = Member::findOrFail($id);
        $user = $member->user;

        $member->delete();
        $user->delete();

        return redirect()->back();
    }




    public function admin_index()
    {
        $model = User::where('type',1)->get();
        return view('admin/user/admin',[
            'model'=>$model
        ]);
    }


    public function admin_create()
    {
        $model = new User();
        return view('admin/user/admin_form',[
            'model'=>$model
        ]);
    }


    public function admin_store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'username' => 'required|max:50|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $model = new User();
        $model->name = $request->nama;
        $model->username = $request->username;
        $model->email = $request->email;
        $model->password = bcrypt($request['password']);
        $model->status = $request->status;
        $model->type = 1;
        $model->save();
        $model->attachRole(1);

        return redirect()->route('admin.user.admin.manage');
    }


    public function admin_show($id)
    {
        //
    }


    public function admin_edit($id)
    {
        $model = User::findOrFail($id);
        return view('admin/user/admin_form',[
            'model'=>$model,
            'update'=>true
        ]);
    }

    public function admin_update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'username' => 'required|max:50',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

        $model = User::findOrFail($id);
        $model->name = $request->nama;
        $model->username = $request->username;
        $model->email = $request->email;
        $model->password = bcrypt($request['password']);
        $model->status = $request->status;
        $model->type = 1;
        $model->save();

        return redirect()->route('admin.user.admin.manage');
    }


    public function admin_destroy($id)
    {
        $model = User::findOrFail($id);
        $model->delete();

        return redirect()->back();
    }
}
