<?php

namespace App\Http\Controllers;

use App\Http\Services\TuitionService;
use App\Http\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TuitionController extends Controller
{
    protected $tuitionService;
    protected $studentService;
    public function __construct(TuitionService $tuitionService, StudentService $studentService)
    {
        $this->tuitionService = $tuitionService;
        $this->studentService = $studentService;
    }
    public function index()
    {
        return view('admin.students.tuition', [
            'title' => 'Tra cứu học phí',
            'paid_tuitions' => $this->tuitionService->getPaidTuition(Session::get('user')->name),
            'tuitions' => $this->tuitionService->getTuition(Session::get('user')->name),
            'student' => $this->studentService->getStudentById(Session::get('user')->name)
        ]);
    }
    public function show()
    {
        return view('admin.students.payment', [
            'title' => 'Nộp học phí',
            'student' => $this->studentService->getStudentById(Session::get('user')->name)
        ]);
    }
    public function create(Request $request)
    {
        $result = $this->tuitionService->create($request);
        if ($result)
            return redirect()->route('tuition.payment.confirm');
    }
    public function confirm()
    {
        return view('admin.students.payment-confirm', [
            'title' => 'Xác thực OTP',
            'infor' => Session::get('infor-payment')
        ]);
    }
    public function add(Request $request)
    {
        $result = $this->tuitionService->add($request);
        if ($result) {
            Session::forget('random_number', 'infor-payment');
            return redirect()->route('tuition.payment');
        }
        return redirect()->back();
    }
}
