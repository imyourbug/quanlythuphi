<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\DiscountService;

class DiscountController extends Controller
{
    protected $discountService;
    public function __construct(DiscountService $discountService){
        $this->discountService = $discountService;
    }
    public function index(){
        return view('admin.discounts.list', [
            'title' => 'Danh sách',
            'discounts' => $this->discountService->getDiscount()
        ]);
    }
    public function store(Request $request){
        $this->discountService->create($request);
        return redirect()->back();
    }

    public function show($id){
        return view('admin.discounts.edit', [
            'title' => 'Cập nhật hình thức',
            'discount' => $this->discountService->getDiscountById($id)
        ]);
    }
    public function update(Request $request, $id){
        $this->discountService->update($request, $id);
        return redirect()->back();
    }
    public function destroy(Request $request){
        $result = $this->discountService->delete($request);
        if($result)
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công!'
            ]);
        return response()->json([
                'error' => true
            ]);
    }
}
