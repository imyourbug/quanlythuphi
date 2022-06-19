<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\StudentService;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    protected $studentService;
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    public function index()
    {
        return view('admin.students.information', [
            'title' => 'Chỉnh sửa thông tin',
            'student' => $this->studentService->getStudentById(Session::get('user')->name)
        ]);
    }
    public function update(Request $request)
    {
        $this->studentService->update($request, Session::get('user')->name);
        return redirect()->back();
    }
}
