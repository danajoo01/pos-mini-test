<?php

namespace App\Helper;

class StringFormater
{
    public static function arrayToString(array $arr)
    {
        return "'".implode("','", $arr)."'";
    }

    public static function formatDate(array $data, array $date)
    {
        $items = [];

        foreach ($date as $tanggal) {
            $ketemu = false;

            foreach ($data as $value) {
                if ($tanggal == $value['tanggal']) {
                    $items[] = $value['total'] ?? 0;
                    $ketemu = true;
                }
            }

            if (!$ketemu) {
                $items[] = 0;
            }
        }

        return implode(',', $items);
    }
}
