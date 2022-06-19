<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\LopService;
use App\Http\Services\DepartmentService;

class LopController extends Controller
{
    protected $lopService;
    public function __construct(LopService $lopService, DepartmentService $departmentService){
        $this->lopService = $lopService;
        $this->departmentService = $departmentService;
    }
    public function index(){
        return view('admin.classes.list', [
            'title' => 'Danh sách lớp',
            'classes' => $this->lopService->getLop(),
            'departments' => $this->departmentService->getDepartment()
        ]);
    }
    public function store(Request $request){
        $this->lopService->create($request);
        return redirect()->back();
        // $this->lopService->createClassName($request);
    }

    public function show($id){
        return view('admin.classes.edit', [
            'title' => 'Cập nhật lớp',
            'class' => $this->lopService->getLopById($id),
            'departments' => $this->departmentService->getDepartment()
        ]);
    }
    public function update(Request $request, $id){
        $this->lopService->update($request, $id);
        return redirect()->back();
    }
    public function destroy(Request $request){
        $result = $this->lopService->delete($request);
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
