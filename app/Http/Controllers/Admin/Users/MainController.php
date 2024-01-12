<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\StudentService;
use App\Http\Services\UserService;
use App\Http\Services\ReceiptService;
use App\Http\Services\TuitionService;


class MainController extends Controller
{

    protected $studentService;
    protected $userService;
    protected $receiptService;
    public function __construct(StudentService $studentService, UserService $userService, ReceiptService $receiptService)
    {
        $this->studentService = $studentService;
        $this->userService = $userService;
        $this->receiptService = $receiptService;
    }

    public function index()
    {
        return view('admin.users.home', [
            'title' => 'Trang chủ',
            'students' => $this->studentService->getAllStudent(),
            'users' => $this->userService->getUser(),
            'receipts' => $this->receiptService->getAllReceipt()
        ]);
    }
}
