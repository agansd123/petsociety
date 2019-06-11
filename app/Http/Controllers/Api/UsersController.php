<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function create()
    {
        return response()->json(['status'=>1,'msg'=>'创建成功！']);
    }

    public function show(User $user)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$user]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['status'=>1,'msg'=>'success','data'=>1245]);
    }

}
