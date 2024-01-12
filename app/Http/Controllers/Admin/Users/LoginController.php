<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Toastr;

class LoginController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'ĐĂNG NHẬP'
        ]);
    }
    public function store(LoginRequest $request)
    {
        if (Auth::attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password')
        ])) {
            $user = $this->userService->getUserByName($request->input('name'));
            Session::put('user', $user);
            if ($user->roles == 1) {
                return redirect()->route('admin.home');
            } else return redirect()->route('home');
        }
        Toastr::error('Tài khoản hoặc mật khẩu không chính xác!', 'Lỗi');
        return redirect()->back();
    }
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }

    public function show()
    {
        return view('admin.users.forgot-pass', [
            'title' => 'Quên mật khẩu'
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->userService->recover_pass($request);
        if ($result)
            return view('admin.users.password-confirm', [
                'title' => 'Lấy lại mật khẩu',
                'user' => $this->userService->getUserByName($request->name)
            ]);

        return redirect()->back();
    }
}
