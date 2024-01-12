<?php
namespace App\Http\Services;
use App\Models\Discount;
use Toastr;
use Illuminate\Support\Facades\DB;

class DiscountService{
    public function create($request){
        try {
            if (!$this->isValid($request->input('MienGiam'))) {
                Toastr::error('Phần trăm miễn giảm phải lớn hơn 0!', 'Lỗi');
                return false;
            } else {
                Discount::create($request->all());
                Toastr::success('Tạo đối tượng thành công!', 'Thành công');
            }
        } catch (Exception $e) {
            Toastr::error('Tạo đối tượng không thành công!', 'Lỗi');
            return false;
        }
        return true;
    }
    public function getDiscountById($id){
        return Discount::where('id', $id)->first();
    }
    public function getDiscount(){
        return Discount::get();
    }
    public function update($request, $id){
        $data = $request->except('_token');
        Discount::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công!', 'Thành công');
        return true;
    }
    public function delete($request){
        $result = Discount::where('id', $request->input('id'))->delete();
        if($result)
            return true;
        return false;
    }
    public function isValid($percent){
        if($percent < 0)
            return false;
        return true;
    }
}
