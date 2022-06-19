<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Toastr;
use App\Jobs\RecoverPassword;

class UserService
{
    public function create($request)
    {
        try {
            if ($this->checkExistsName($request->input('name'))) {
                Toastr::error('Tài khoản đã có người đăng ký!', 'Lỗi');
                return false;
            } elseif ($this->checkExistsEmail($request->input('email'))) {
                Toastr::error('Email này đã được sử dụng!', 'Lỗi');
                return false;
            } elseif ($request->input('password') != $request->input('repassword')) {
                Toastr::error('Mật khẩu nhập lại không trùng khớp!', 'Lỗi');
                return false;
            } else {
                $data = $request->all();
                $data['password'] = Hash::make($request->password);
                User::create($data);
                Toastr::success('Đăng ký thành công!', 'Thành công');
            }
        } catch (Exception $e) {
            Toastr::error('Đăng ký không thành công!', 'Lỗi');
            return false;
        }
        return true;
    }
    public function checkExistsName($name)
    {
        $user = User::where('name', $name)->first();
        if ($user)
            return true;
        return false;
    }
    public function checkExistsEmail($email)
    {
        $user = User::where('email', $email)->first();
        if ($user)
            return true;
        return false;
    }
    public function getUserByName($name)
    {
        return User::where('name', $name)->first();
    }
    public function getUserByNameAndEmail($name, $email)
    {
        return User::where('name', $name)->where('email', $email)->first();
    }
    public function getUserById($id)
    {
        return User::where('id', $id)->first();
    }
    public function getUser()
    {
        return User::get();
    }
    public function checkUser($request)
    {
        if ($request->input('password') != $request->input('repassword')) {
            Toastr::error('Mật khẩu nhập lại không trùng khớp!', 'Lỗi');
            return false;
        }
        if (Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('oldpassword')]))
            return true;
        Toastr::error('Mật khẩu cũ không chính xác!', 'Lỗi');
        return false;
    }
    public function update($request, $id)
    {
        // dd($request->all());
        if ($request->input('password') != $request->input('repassword')) {
            Toastr::error('Mật khẩu nhập lại không trùng khớp!', 'Lỗi');
            return false;
        } else {
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            User::find($id)->update($data);
        }
        Toastr::success('Cập nhật thành công!', 'Thành công');
        return true;
    }
    public function delete($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
    public function edit($request)
    {
        // dd($request->all());
        if ($this->checkUser($request)) {
            $data = $request->except('_token', 'oldpassword', 'repassword');
            $data['password'] = Hash::make($request->password);
            // dd($data);
            User::where('name', $request->input('name'))->update($data);
            Toastr::success('Đổi mật khẩu thành công!', 'Thành công');
            return true;
        }
        return false;
    }

    public function recover_pass($request)
    {
        // dd($request->all());
        if ($this->validate($request)) {
            $data = $request->except('_token');
            $new_pass = $this->getNewPass();
            $data['password'] = Hash::make($new_pass);

            User::where('name', $request->name)->update($data);

            #Queues
            RecoverPassword::dispatch($request->email, $new_pass)->delay(now()->addSecond(2));

            return true;
        }
        return false;
    }

    public function getNewPass()
    {
        $new_pass  = '';
        $a = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
        for ($i = 0; $i < count($a); $i++) {
            $j = rand(0, count($a) - 1);
            $new_pass .= $a[$j];
        }
        return $new_pass;
    }
    public function validate($request)
    {
        if (!$this->getUserByName($request->name)) {
            Toastr::error('Tài khoản không tồn tại!', 'Lỗi');
            return false;
        } else if (!$this->checkExistsEmail($request->email)) {
            Toastr::error('Email không tồn tại!', 'Lỗi');
            return false;
        } else if (!$this->getUserByNameAndEmail($request->name, $request->email)) {
            Toastr::error('Tài khoản và email không trùng khớp!', 'Lỗi');
            return false;
        }
        return true;
    }
}
