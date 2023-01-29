<?php
// 時間表記 完全秒数s と 時分秒 との変換用

namespace App\Library;

use Illuminate\Support\Facades\Facade;

class sHms extends Facade
{
    // 定義関数
    public static function s2hms(int $s): array {
        $hms['h'] = floor($s / 3600);
        $hms['m'] = floor(($s / 60) % 60);
        $hms['s'] = $s % 60;
            
        return $hms;
    }

    public static function hms2s(string $str): int {
        $t = explode(":", $str); // 文字列 → 配列化
        $h = (int)$t[0];
        if (isset($t[1])) { //分の部分に値が入っているか確認
            $m = (int)$t[1];
        } else {
            $m = 0;
        }
        if (isset($t[2])) { //秒の部分に値が入っているか確認
            $s = (int)$t[2];
        } else {
            $s = 0;
        }

        return ($h * 60 * 60) + ($m * 60) + $s;
    }

}

