<?php

namespace App\Http\Services;

use App\Models\Receipt;
use Illuminate\Support\Facades\DB;
use Exception;
use Toastr;

class ReceiptService
{
    public function create($request)
    {
        try {
            $data = $request->except('_token');
            Receipt::create($data);
        } catch (Exception $e) {
            Toastr::error('Tạo phiếu thu không thành công!', 'Lỗi');
            return false;
        }
        Toastr::success('Tạo phiếu thu thành công!', 'Thành công');
        return true;
    }
    public function getReceiptById($id)
    {
        return Receipt::with('student')->where('id', $id)->first();
    }
    public function getReceipt()
    {
        return Receipt::with('student')->paginate(5);
    }
    public function getAllReceipt()
    {
        return Receipt::with('student')->get();
    }
    public function update($request, $id)
    {
        $data = $request->except('_token');
        Receipt::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công!', 'Thành công');
        return true;
    }
    public function delete($request)
    {
        $result = DB::table('receipts')->where('id', $request->input('id'))->delete();
        if ($result) {
            return true;
        }
        return false;
    }
}
