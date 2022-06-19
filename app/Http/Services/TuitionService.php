<?php

namespace App\Http\Services;

use Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Jobs\SendOTP;
use App\Models\Receipt;

class TuitionService
{
    public function getPaidTuition($masv)
    {
        return Receipt::where('MaSV', $masv)->get();
    }
    public function getTuition($masv)
    {
        return DB::table('regis_subjects')->join('subjects', 'subjects.id', 'regis_subjects.MaMH')
            ->join('students', 'regis_subjects.MaSV', '=', 'students.MaSV')
            ->join('discounts', 'students.MaDT', '=', 'discounts.id')
            ->select('students.MaSV', 'subjects.HocKy', DB::raw('sum(SoTienMotTin * SoTC) SoTien'))
            ->where('students.MaSV', $masv)
            ->groupBy('students.MaSV', 'subjects.HocKy')->get();
    }
    public function getListTuitions($request)
    {
        $masv = $request->input('MaSV');
        return DB::table('regis_subjects')
            ->join('students', 'regis_subjects.MaSV', '=', 'students.MaSV')
            ->leftJoin('receipts', 'receipts.MaSV', '=', 'students.MaSV')
            ->join('discounts', 'students.MaDT', '=', 'discounts.id')
            ->join('subjects', 'subjects.id', 'regis_subjects.MaMH')
            ->select(
                'students.*',
                'discounts.MienGiam',
                DB::raw('sum(SoTienMotTin * SoTC) SoTien'),
                DB::raw('sum(SoTienNop) DaNop')
            )
            ->when($masv, function ($query, $masv) {
                $query->where('students.MaSV', $masv);
            })
            ->groupBy('students.MaSV')->get();
    }
    public function create($request)
    {
        $data = $request->except('_token');
        $data['MaSV'] = Session::get('user')->name;
        Session::put('infor-payment', $data);
        $random_number = mt_rand(1000, 9999);
        Session::put('random_number', $random_number);

        #mail otp
        SendOTP::dispatch($random_number, $data['Email'])->delay(now()->addSecond(1));

        return true;
    }
    public function add($request)
    {
        if ($request->input('MaSo') == Session::get('random_number')) {
            $data = Session::get('infor-payment');
            unset($data['Email']);
            $result = Receipt::create($data);
            if ($result) {
                Toastr::success('Nộp học phí thành công!', 'Thành công');
                return true;
            }
            Toastr::error('Nộp học phí không thành công!', 'Lỗi');
            return false;
        }
        Toastr::error('Mã OTP không chính xác!', 'Lỗi');
        return false;
    }
}
