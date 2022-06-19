<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\SubjectService;

class SubjectController extends Controller
{
    protected $subjectService;
    public function __construct(SubjectService $subjectService){
        $this->subjectService = $subjectService;
    }
    public function create(){
        return view('admin.subjects.add', [
            'title' => 'Thêm môn học'
        ]);
    }
    public function store(Request $request){
        $this->subjectService->create($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.subjects.list', [
            'title' => 'Danh sách môn học',
            'subjects' => $this->subjectService->getSubject()
        ]);
    }
    public function show($id){
        return view('admin.subjects.edit', [
            'title' => 'Cập nhật môn học',
            'subject' => $this->subjectService->getSubjectById($id)
        ]);
    }
    public function update(Request $request, $id){
        $this->subjectService->update($request, $id);
        return redirect()->back();
    }
    public function destroy(Request $request){
        $result = $this->subjectService->delete($request);
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
