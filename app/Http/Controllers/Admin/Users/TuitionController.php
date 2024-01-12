<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Services\TuitionService;
use App\Http\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TuitionController extends Controller
{
    protected $tuitionService;
    protected $studentService;
    public function __construct(TuitionService $tuitionService, StudentService $studentService)
    {
        $this->tuitionService = $tuitionService;
        $this->studentService = $studentService;
    }
    public function index(Request $request)
    {
        return view('admin.tuitions.list', [
            'title' => 'Danh sách học phí',
            'tuitions' => $this->tuitionService->getListTuitions($request),
            'students' => $this->studentService->getAllStudent(),
        ]);
    }
}
