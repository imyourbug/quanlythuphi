<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function create()
    {
        return view('admin.users.add', [
            'title' => 'Thêm tài khoản'
        ]);
    }
    public function store(UserRequest $request)
    {
        $this->userService->create($request);
        return redirect()->back();
    }
    public function index()
    {
        return view('admin.users.list', [
            'title' => 'Danh sách tài khoản',
            'users' => $this->userService->getUser()
        ]);
    }
    public function show($id)
    {
        return view('admin.users.edit', [
            'title' => 'Cập nhật tài khoản',
            'user' => $this->userService->getUserById($id)
        ]);
    }
    public function update(UserRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $result = $this->userService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa tài khoản thành công!'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
    public function changepass()
    {
        return view('admin.students.changepass', [
            'title' => 'Đổi mật khẩu',
            'user' => $this->userService->getUserByName(Session::get('user')->name)
        ]);
    }
    public function edit(Request $request)
    {
        $this->userService->edit($request);
        return redirect()->back();
    }

    public function forgot()
    {
        return view('admin.users.forgot-pass', [
            'title' => 'LẤY LẠI MẬT KHẨU'
        ]);
    }
}
