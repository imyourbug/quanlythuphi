<?php
namespace App\Http\Services;
use App\Models\Department;
use Toastr;
use Illuminate\Support\Facades\DB;

class DepartmentService{
    public function create($request){
        try {
            if ($this->checkExistsMaKhoa($request->input('MaKhoa'))) {
                Toastr::error('Mã khoa đã tồn tại!', 'Lỗi');
                return false;
            } else {
                Department::create($request->all());
                Toastr::success('Tạo khoa thành công!', 'Thành công');
            }
        } catch (Exception $e) {
            Toastr::error('Tạo khoa không thành công!', 'Lỗi');
            return false;
        }
        return true;
    }
    public function checkExistsMaKhoa($ma)
    {
        $department = Department::where('MaKhoa', $ma)->first();
        if ($department)
            return true;
        return false;
    }
    public function getDepartmentById($id){
        return Department::where('MaKhoa', $id)->first();
    }
    public function getDepartment(){
        return Department::get();
    }
    public function update($request, $id){
        Department::where('MaKhoa', $id)->update([
            'TenKhoa' => $request->input('TenKhoa')
        ]);
        Toastr::success('Cập nhật thành công!', 'Thành công');
        return true;
    }
    public function delete($request){
        $result = DB::table('departments')->where('MaKhoa', $request->input('id'))->delete();
        if($result){
            return true;
        }
        return false;
    }
}
