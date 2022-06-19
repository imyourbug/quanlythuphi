<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\StudentService;
use App\Http\Services\DiscountService;
use App\Http\Services\LopService;

class StudentController extends Controller
{
    protected $lopService;
    protected $discountService;
    protected $studentService;
    public function __construct(LopService $lopService, StudentService $studentService, DiscountService $discountService)
    {
        $this->studentService = $studentService;
        $this->discountService = $discountService;
        $this->lopService = $lopService;
    }
    public function create()
    {
        return view('admin.students.add', [
            'title' => 'Thêm sinh viên',
            'discounts' => $this->discountService->getDiscount(),
            'classes' => $this->lopService->getAllLop()
        ]);
    }
    public function store(Request $request)
    {
        $this->studentService->create($request);
        return redirect()->back();
    }
    public function index(Request $request)
    {
        $MaSV = $request->MaSV;
        return view('admin.students.list', [
            'title' => 'Danh sách sinh viên',
            'listStudents' => $this->studentService->getStudent($request),
            'students' => $this->studentService->getAllStudent()
        ]);
    }
    public function show($id)
    {
        return view('admin.students.edit', [
            'title' => 'Cập nhật sinh viên',
            'discounts' => $this->discountService->getDiscount(),
            'classes' => $this->lopService->getLop(),
            'student' => $this->studentService->getStudentById($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        $this->studentService->update($request, $id);
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $result = $this->studentService->delete($request);
        if ($result)
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công!'
            ]);
        return response()->json([
            'error' => true
        ]);
    }
}
