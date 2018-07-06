<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{

    /**
     * 显示登录页面
     */
    public function  create()
    {
        return view('sessions.create');
    }

    /**
     * 创建新会话（登录）
     */
    public function store(Request $request)
    {
        //验证登陆信息的格式
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        //验证角色的身份
        if(Auth::attempt($credentials,$request->has('remember'))) {
            session()->flash('success','欢迎回来');
            return redirect()->route('users.show',[Auth::user()]);
        }else{
            session()->flash('danger','很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }
    }

    /**
     * 销毁会话（退出登录）
     */
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
