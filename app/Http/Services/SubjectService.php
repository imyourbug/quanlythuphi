<?php

namespace App\Http\Services;

use App\Models\Subject;
use App\Models\RegisSubject;
use Illuminate\Support\Facades\DB;
use Exception;
use Toastr;

class SubjectService
{
    public function create($request)
    {
        try {
            if ($this->checkExistsName($request->input('TenMH'))) {
                Toastr::error('Môn học đã tồn tại!', 'Lỗi');
                return false;
            } else {
                Subject::create($request->all());
                Toastr::success('Tạo môn học thành công!', 'Thành công');
            }
        } catch (Exception $e) {
            Toastr::error('Tạo môn học không thành công!', 'Lỗi');
            return false;
        }
        return true;
    }
    public function checkExistsName($tenmh)
    {
        $subject = Subject::where('TenMH', $tenmh)->first();
        if ($subject)
            return true;
        return false;
    }
    public function getSubjectByName($tenmh)
    {
        return Subject::where('TenMH', $tenmh)->first();
    }
    public function getSubjectById($id)
    {
        return Subject::where('id', $id)->first();
    }
    public function getSubject()
    {
        return Subject::get();
    }
    public function update($request, $id)
    {
        Subject::find($id)->update($request->all());
        Toastr::success('Cập nhật thành công!', 'Thành công');
        return true;
    }
    public function delete($request)
    {
        $subject = Subject::where('id', $request->input('id'))->first();
        if ($subject) {
            $subject->delete();
            return true;
        }
        return false;
    }
    #regis subject
    public function getSubjectByUser($masv)
    {
        $subjects = RegisSubject::where('MaSV', $masv)->pluck('MaSV', 'MaMH')->toArray();
        $subjectID = array_keys($subjects);
        return Subject::whereNotIn('id', $subjectID)->get();
    }
    public function regis($request)
    {
        try {
            $data = $request->except('_token');
            RegisSubject::create($data);
            return true;
        } catch (Exception $e) {
            return false;
        }
        return false;
    }
    public function getRegisteredSubject($masv)
    {
        return DB::table('regis_subjects')
            ->join('subjects', 'regis_subjects.MaMH', '=', 'subjects.id')
            ->select('regis_subjects.*', 'subjects.SoTienMotTin', 'subjects.HocKy', 'subjects.TenMH', 'subjects.SoTC')
            ->where('regis_subjects.MaSV', $masv)->get();
    }
    public function destroy($request)
    {
        // dd($request->all());
        try {
            $result = DB::table('regis_subjects')->where('MaSV', $request->input('MaSV'))
                ->where('MaMH', $request->input('MaMH'))->delete();
            if ($result)
                return true;
        } catch (Exception $e) {
            return false;
        }
        return false;
    }
}
