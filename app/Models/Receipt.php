<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'TenNT',
        'MaSV',
        'SoTienNop'
    ];
    public function student(){
        return $this->hasOne(Student::class, 'MaSV', 'MaSV');
    }
}
