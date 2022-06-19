<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\DepartmentService;

class DepartmentController extends Controller
{
    protected $departmentService;
    public function __construct(DepartmentService $departmentService){
        $this->departmentService = $departmentService;
    }
    public function index(){
        return view('admin.departments.list', [
            'title' => 'Danh sách khoa',
            'departments' => $this->departmentService->getDepartment()
        ]);
    }
    public function store(Request $request){
        $this->departmentService->create($request);
        return redirect()->back();
    }

    public function show($id){
        return view('admin.departments.edit', [
            'title' => 'Cập nhật khoa',
            'department' => $this->departmentService->getDepartmentById($id)
        ]);
    }
    public function update(Request $request, $id){
        $this->departmentService->update($request, $id);
        return redirect()->back();
    }
    public function destroy(Request $request){
        $result = $this->departmentService->delete($request);
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
