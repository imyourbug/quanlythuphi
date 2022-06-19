<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\ReceiptService;
use App\Http\Services\DiscountService;
use App\Http\Services\LopService;
use App\Http\Services\StudentService;
use PDF;

class ReceiptController extends Controller
{
    protected $lopService;
    protected $discountService;
    protected $receiptservice;
    protected $studentService;
    public function __construct(StudentService $studentService, LopService $lopService, ReceiptService $receiptservice, DiscountService $discountService){
        $this->receiptService = $receiptservice;
        $this->discountService = $discountService;
        $this->lopService = $lopService;
        $this->studentService = $studentService;
    }
    public function create(){
        return view('admin.receipts.add', [
            'title' => 'Thêm phiếu thu',
            'classes' => $this->lopService->getLop(),
            'students' => $this->studentService->getStudent()
        ]);
    }
    public function store(Request $request){
        $this->receiptService->create($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.receipts.list', [
            'title' => 'Danh sách phiếu thu',
            'receipts' => $this->receiptService->getReceipt()
        ]);
    }
    public function show($id){
        return view('admin.receipts.edit', [
            'title' => 'Cập nhật phiếu thu',
            'students' => $this->studentService->getStudent(),
            'classes' => $this->lopService->getLop(),
            'receipt' => $this->receiptService->getReceiptById($id)
        ]);
    }
    public function detail($id){
        return view('admin.receipts.detail', [
            'title' => 'Chi tiết phiếu thu',
            'receipt' => $this->receiptService->getReceiptById($id)
        ]);
    }
    public function export($id){
        $pdf = PDF::loadView('admin.receipts.pdf', [
            'title' => 'Chi tiết phiếu thu',
            'receipt' => $this->receiptService->getReceiptById($id)
        ]);
        return $pdf->stream('receipt.pdf')->header('text/html','utf-8');
    }

    public function update(Request $request, $id){
        $this->receiptService->update($request, $id);
        return redirect()->back();
    }
    public function destroy(Request $request){
        $result = $this->receiptService->delete($request);
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
