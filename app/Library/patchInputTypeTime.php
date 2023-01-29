<?php
// HTMLの<input type="time">において、00:00:00が、00:00として扱われるバグのpatch

namespace App\Library;

use Illuminate\Support\Facades\Facade;

class patchInputTypeTime extends Facade
{
    // 定義関数
    public static function patch(string $s): string {
        if ($s == "00:00") {
            $s = "00:00:00";
        }

        return $s;
    }

}

