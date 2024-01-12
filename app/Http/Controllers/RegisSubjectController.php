<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SubjectService;
use App\Models\RegisSubject;
use Illuminate\Support\Facades\Session;

class RegisSubjectController extends Controller
{
    protected $subjectService;
    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }
    public function index()
    {
        $user_name = Session::get('user')->name;
        return view('admin.students.regis-subject', [
            'title' => 'Đăng ký tín chỉ',
            'subjects' => $this->subjectService->getSubjectByUser($user_name),
            'registered_sub' => $this->subjectService->getRegisteredSubject($user_name)
        ]);
    }
    public function store(Request $request)
    {
        $result = $this->subjectService->regis($request);
        if ($result)
            return response()->json([
                'error' => false,
                'message' => 'Đăng ký tín chỉ thành công!'
            ]);
        return response()->json([
            'error' => true
        ]);
    }
    public function destroy(Request $request)
    {
        $result = $this->subjectService->destroy($request);
        if ($result)
            return response()->json([
                'error' => false,
                'message' => 'Hủy đăng ký thành công!'
            ]);
        return response()->json([
            'error' => true
        ]);
    }
}
