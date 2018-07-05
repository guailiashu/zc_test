<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class UsersController extends Controller
{
    //侧边栏，登陆
     public  function signup(){
         return view('users.create');
     }

     //显示所有用户列表的页面
     public  function index(){
         return view('u');
     }

     //显示用户个人信息的页面
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //创建用户的页面
    public  function create()
    {
        return view('');
    }

    //创建用户
    public  function store(Request $request )
    {
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|confirmed|min:6'
        ]);

        //用户注册成功数据入库，重定向页面
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return  redirect()->route('users.show', [$user]);
    }

    //编辑用户个人资料的页面
    public  function edit()
    {
        return view('');
    }

    //更新用户
    public  function update()
    {
        return view('');
    }


    //删除用户
    public  function destroy()
    {
        return view('');
    }
}
