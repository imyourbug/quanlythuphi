<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaLop',
        'TenLop',
        'SiSo',
        'Khoa'
    ];
    public function department(){
        return $this->hasOne(Department::class, 'MaKhoa', 'Khoa');
    }
}
