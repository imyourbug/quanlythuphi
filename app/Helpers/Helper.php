<?php
namespace App\Helpers;
class Helper{
    public static function status($status)
    {
        if ($status == 0) {
            $status = '<span class="badge badge-success">Đã đủ</span>';
        } elseif ($status > 0) {
            $status = '<span class="badge badge-danger">Còn nợ</span>';
        } else $status = '<span class="badge badge-info">Nộp dư</span>';

        return $status;
    }
}
