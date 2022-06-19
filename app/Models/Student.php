<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'MaSV',
        'TenSV',
        'GioiTinh',
        'NgaySinh',
        'MaDT',
        'Lop'
    ];
    public function discount(){
        return $this->hasOne(Discount::class, 'id', 'MaDT');
    }
    public function class(){
        return $this->hasOne(Lop::class, 'MaLop', 'Lop');
    }
}
