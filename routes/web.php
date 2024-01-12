<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\SubjectController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\Users\MainController;
use App\Http\Controllers\Admin\Users\DepartmentController;
use App\Http\Controllers\Admin\Users\LopController;
use App\Http\Controllers\Admin\Users\StudentController;
use App\Http\Controllers\Admin\Users\DiscountController;
use App\Http\Controllers\Admin\Users\ReceiptController;
use App\Http\Controllers\TuitionController;
use App\Http\Controllers\RegisSubjectController;


Route::get('admin/home', [MainController::class, 'index'])->name('admin.home');

Route::prefix('admin/users')->group(function () {
    #login
    Route::prefix('/login')->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/store', [LoginController::class, 'store']);
    });
    #logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    #lấy lại mật khẩu
    Route::prefix('/forgot-pass')->group(function () {
        Route::get('/', [LoginController::class, 'show'])->name('forgot-pass');
        Route::post('/', [LoginController::class, 'update']);
    });
});

Route::middleware(['auth'])->group(function () {
    #tài khoản
    Route::prefix('admin/users')->group(function () {
        Route::get('/add', [UserController::class, 'create'])->name('user.add');
        Route::post('/add', [UserController::class, 'store']);
        Route::get('/list', [UserController::class, 'index'])->name('user.list');
        Route::get('/edit/{id}', [UserController::class, 'show']);
        Route::post('/edit/{id}', [UserController::class, 'update']);
        Route::DELETE('/destroy', [UserController::class, 'destroy']);
    });
    #môn học
    Route::prefix('admin/subjects')->group(function () {
        Route::get('/add', [SubjectController::class, 'create'])->name('subject.add');
        Route::post('/add', [SubjectController::class, 'store']);
        Route::get('/list', [SubjectController::class, 'index'])->name('subject.list');
        Route::get('/edit/{id}', [SubjectController::class, 'show']);
        Route::post('/edit/{id}', [SubjectController::class, 'update']);
        Route::DELETE('/destroy', [SubjectController::class, 'destroy']);
    });
    #khoa
    Route::prefix('admin/departments')->group(function () {
        Route::get('/list', [DepartmentController::class, 'index'])->name('derpartment.list');
        Route::post('/list', [DepartmentController::class, 'store']);
        Route::get('/edit/{id}', [DepartmentController::class, 'show']);
        Route::post('/edit/{id}', [DepartmentController::class, 'update']);
        Route::DELETE('/destroy', [DepartmentController::class, 'destroy']);
    });
    #lớp
    Route::prefix('admin/classes')->group(function () {
        Route::get('/list', [LopController::class, 'index'])->name('lop.list');
        Route::post('/list', [LopController::class, 'store']);
        Route::get('/edit/{id}', [LopController::class, 'show']);
        Route::post('/edit/{id}', [LopController::class, 'update']);
        Route::DELETE('/destroy', [LopController::class, 'destroy']);
    });
    #sinh viên
    Route::prefix('admin/students')->group(function () {
        Route::get('/add', [StudentController::class, 'create'])->name('student.add');
        Route::post('/add', [StudentController::class, 'store']);
        Route::get('/list', [StudentController::class, 'index'])->name('student.list');
        Route::get('/edit/{id}', [StudentController::class, 'show']);
        Route::post('/edit/{id}', [StudentController::class, 'update']);
        Route::DELETE('/destroy', [StudentController::class, 'destroy']);
    });
    #đối tượng
    Route::prefix('admin/discounts')->group(function () {
        Route::get('/list', [DiscountController::class, 'index'])->name('discount.list');
        Route::post('/list', [DiscountController::class, 'store']);
        Route::get('/edit/{id}', [DiscountController::class, 'show']);
        Route::post('/edit/{id}', [DiscountController::class, 'update']);
        Route::DELETE('/destroy', [DiscountController::class, 'destroy']);
    });
    #biên lai
    Route::prefix('admin/receipts')->group(function () {
        Route::get('/add', [ReceiptController::class, 'create'])->name('receipt.add');
        Route::post('/add', [ReceiptController::class, 'store']);
        Route::get('/list', [ReceiptController::class, 'index'])->name('receipt.list');
        Route::post('/list', [ReceiptController::class, 'store']);
        Route::get('/edit/{id}', [ReceiptController::class, 'show']);
        Route::post('/edit/{id}', [ReceiptController::class, 'update']);
        Route::get('/detail/{id}', [ReceiptController::class, 'detail']);
        //xuat excel
        Route::get('/export/{id}', [ReceiptController::class, 'export']);
        //
        Route::DELETE('/destroy', [ReceiptController::class, 'destroy']);

        // Route::post('/export/{id}', [ReceiptController::class, 'index']);
    });
    #danh sách học phí
    Route::prefix('admin/tuitions')->group(function () {
        Route::get('/list', [App\Http\Controllers\Admin\Users\TuitionController::class, 'index'])->name('tuition.list');
    });
    #tra cứu, nộp học phí
    Route::prefix('tuitions')->group(function () {
        Route::get('/detail', [TuitionController::class, 'index'])->name('tuition');
        Route::get('/payment', [TuitionController::class, 'show'])->name('tuition.payment');
        Route::post('/payment', [TuitionController::class, 'create']);
        Route::get('/payment/confirm', [TuitionController::class, 'confirm'])->name('tuition.payment.confirm');
        Route::post('/payment/confirm', [TuitionController::class, 'add']);
    });
    #tín chỉ
    Route::prefix('/regis-subjects')->group(function () {
        Route::get('/', [RegisSubjectController::class, 'index'])->name('regis-subject');
        Route::post('/add', [RegisSubjectController::class, 'store']);
        Route::DELETE('/destroy', [RegisSubjectController::class, 'destroy']);
    });
    #thông tin cá nhân
    Route::prefix('/informations')->group(function () {
        Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('information');
        Route::post('/', [App\Http\Controllers\StudentController::class, 'update']);
        // Route::DELETE('/destroy', [RegisSubjectController::class, 'destroy']);
    });
    #đổi mật khẩu
    Route::prefix('/changepass')->group(function () {
        Route::get('/', [UserController::class, 'changepass'])->name('changepass');
        Route::post('/', [UserController::class, 'edit']);
    });
});
Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
