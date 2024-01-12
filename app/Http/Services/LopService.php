<?php

namespace App\Http\Services;

use App\Models\Lop;
use Illuminate\Support\Facades\DB;
use Exception;
use Toastr;

class LopService
{
    public function create($request)
    {
        if (!$this->isValid($request)) {
            Toastr::error('Dữ liệu không hợp lệ!', 'Lỗi');
            return false;
        } else {
            $className = $this->createClassName($request);
            // dd($className);
            foreach ($className as $class) {
                try {
                    Lop::create([
                        'MaLop' => (string) $class,
                        'TenLop' => (string) $class,
                        'SiSo' => (int) $request->input('siso'),
                        'Khoa' => (string) $request->input('khoa')
                    ]);
                } catch (Exception $e) {
                    Toastr::error('Tạo lớp không thành công!', 'Lỗi');
                    return false;
                }
            }
            Toastr::success('Tạo lớp thành công!', 'Thành công');
        }
        return true;
    }
    public function checkExistsClass($malop)
    {
        $lop = Lop::where('MaLop', $malop)->first();
        if ($lop)
            return true;
        return false;
    }
    public function getLopById($id)
    {
        return Lop::where('MaLop', $id)->first();
    }
    public function getLop()
    {
        return Lop::paginate(5);
    }
    public function getAllLop()
    {
        return Lop::get();
    }
    public function update($request, $id)
    {
        $data = $request->except('_token');
        Lop::where('MaLop', $id)->update($data);
        Toastr::success('Cập nhật thành công!', 'Thành công');
        return true;
    }
    public function delete($request)
    {
        $result = DB::table('lops')->where('MaLop', $request->input('id'))->delete();
        if ($result) {
            return true;
        }
        return false;
    }
    public function createClassName($request)
    {
        $className = [];
        $thutu = $request->input('thutu');
        $khoa = $request->input('khoa');
        $siso = $request->input('siso');
        $solop = $request->input('solop');
        $nextClass = $this->exitstClassInDepartment($request);
        if ($nextClass != 1 & $thutu == substr($nextClass, 0, 2)) {
            $nextClass = (int) substr($nextClass, -2);
            $j = 0;
            for ($i = $nextClass + 1; $i <= $solop + $nextClass; $i++) {
                $className[$j] = $thutu . 'DC' . substr($khoa, 2, 2) . $i;
                $j++;
            }
        } else {
            for ($i = 1; $i <= $solop; $i++) {
                $className[$i - 1] = $thutu . 'DC' . substr($khoa, 2, 2) . (20 + $i);
            }
        }
        return $className;
        // foreach($className as $class){
        //     dd($class);
        // }
    }
    public function isValid($request)
    {
        if ($request->input('thutu') < 0 | $request->input('siso') < 0 | $request->input('solop') <= 0)
            return false;
        return true;
    }
    public function exitstClassInDepartment($request)
    {
        // dd($request->input());
        $class = DB::table('lops')->select(DB::raw('substring(MaLop, 1, 2) as ThuTu, MaLop'))
            ->where('Khoa', $request->input('khoa'))->groupBy('MaLop')
            ->having('ThuTu', $request->input('thutu'))->orderByDesc('MaLop')->first();
        // dd($class);
        if (!is_null($class))
            return $class->MaLop;
        return 1;
    }
}
