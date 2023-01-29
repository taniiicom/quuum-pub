<?php
// 単位変換用 (h/m/n → nQ/nR)

namespace App\Library;

use Illuminate\Support\Facades\Facade;

class hmn2nQR extends Facade
{
    // 共通関数
    // 「時間」の場合
    // 商 (整数)
    public static function h2nQ(int $h, int $start_sec, int $loop_duration): int {
        // 切り捨て(床) → 切り上げ(天井)
        return ceil(($h * 60 * 60 - $start_sec) / $loop_duration);
    }
    // 余り (整数)
    public static function h2nR(int $h, int $start_sec, int $loop_duration): int {
        return ($h * 60 * 60 - $start_sec) % $loop_duration;
    }

    // 「分」の場合
    // 商 (整数)
    public static function m2nQ(int $m, int $start_sec, int $loop_duration): int {
        // 切り捨て(床) → 切り上げ(天井)
        return ceil(($m * 60 - $start_sec) / $loop_duration);
    }
    // 余り (整数)
    public static function m2nR(int $m, int $start_sec, int $loop_duration): int {
        return ($m * 60 - $start_sec) % $loop_duration;
    }

    // 「回」の場合
    // 商 (整数)
    public static function nQ(int $n): int {
        return $n;
    }
    // 余り (整数)
    public static function nR(): int {
        // 回数指定の場合は、strictモードでも、非strictモードと同様にあつかう. 曲のエンディングまで再生.
        $strict = (bool)false;
        return 0;
    }

}

