<?php

namespace App\Http\Services;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Toastr;

class StudentService
{
    public function create($request)
    {
        try {
            $data = $request->except('_token');
            $data['MaSV'] = $this->createMaSV($request->input('Lop'));
            // dd($data['MaSV']);
            Student::create($data);

            User::create([
                'name' => (string) $data['MaSV'],
                'email' => null,
                'password' => bcrypt(1),
                'roles' => 0
            ]);
            Toastr::success('Tạo sinh viên thành công!', 'Thành công');
        } catch (Exception $e) {
            Toastr::error('Tạo sinh viên không thành công!', 'Lỗi');
            return false;
        }
        return true;
    }
    public function getStudentById($id)
    {
        return Student::with('class')
            ->with('discount')
            ->where('MaSV', $id)->first();
    }
    public function getStudent($request)
    {
        $masv = $request->MaSV;
        return Student::with('discount')
            ->orderBy('MaSV')
            ->when($masv, function ($query, $masv) {
                $query->where('MaSV', $masv);
            })
            ->get();
    }
    public function getAllStudent()
    {
        return Student::with('discount')
            ->orderBy('MaSV')
            ->get();
    }
    public function update($request, $id)
    {
        $data = $request->except('_token');
        // dd($data);
        Student::where('MaSV', $id)->update($data);
        Toastr::success('Cập nhật thành công!', 'Thành công');
        return true;
    }
    public function delete($request)
    {
        $result = DB::table('students')->where('MaSV', $request->input('id'))->delete();
        if ($result)
            return true;
        return false;
    }
    //tao ma sv
    public function createMaSV($malop)
    {
        $masv = '';
        if (!$this->checkExitsStudentByClassName($malop))
            return $malop . '001';
        $masv = substr($this->getLastStudent($malop), -3) + 1;
        if ($masv < 10)
            $masv = '00' . $masv;
        if ($masv >= 10 & $masv < 100)
            $masv = '0' . $masv;
        return $malop . $masv;
    }
    public function checkExitsStudentByClassName($malop)
    {
        $stu = Student::where('Lop', $malop)->first();
        if (is_null($stu)) {
            return false;
        }
        return true;
    }
    public function getLastStudent($malop)
    {
        $stu = Student::where('Lop', $malop)->orderByDesc('MaSV')->first();
        return $stu->MaSV;
    }
    //
}
