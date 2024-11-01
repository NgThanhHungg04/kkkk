<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login_index()
    {
        return view('auth.login');
    }
    public function login_post(Request $request){
        $user = $this->user->where([
            ['email',$request->email],
            ['password',$request->password]
        ])->get();
        if ($user) {
            Session::put('user_admin', $user);
            return redirect('/admin');
        }

        return View();
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        // Invalidate và regenerate CSRF token để bảo mật
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Chuyển hướng về trang login hoặc trang chủ
        return redirect('/login-admin');
    }

    //Xử lý trang đăng nhập
    // public function login_post(Request $request){
    //     // Xác thực thông tin người dùng
    //     $credentials = $request->only('email', 'password');
        
    //     if (Auth::attempt($credentials)) {
    //         // Lưu thông tin người dùng vào session
    //         Session::put('user_admin', Auth::user());
    //         return redirect('/admin')->with('success', 'Đăng nhập thành công!');
    //     }

    //     // Trả về lỗi nếu đăng nhập không thành công
    //     return back()->withErrors(['login' => 'Email hoặc mật khẩu không chính xác']);
    // }
    // // Đăng xuất người dùng
    // public function logout()
    // {
    //     Auth::logout();
    //     Session::forget('user_admin');
    //     return redirect('/login-admin');
    // }


    
}
// Session::put('customer', [$customer]); // Đảm bảo lưu dưới dạng mảng

