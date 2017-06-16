<?php

// 示例
$arr = [
    0 => ['id' => '26', 'name' => 'Jobs'],
    1 => ['id' => '18', 'name' => 'Kent'],
    2 => ['id' => '21', 'name' => 'Fany'],
    3 => ['id' => '6', 'name' => 'Lucy'],
];
var_dump(array_reset_idx($arr, 'id'));
echo "\n\n\n\n";
var_dump(array_reset_idx($arr, 'name', 2));


/**
 * 返回以原数组某个值为下标的新数据
 *
 * @param  array    $arr
 * @param  string   $idx
 * @param  int      $type       1:一维数组 2:二维数组
 * @return array
 */
function array_reset_idx($arr, $idx, $type = 1)
{
    if (is_array($arr)) {
        $tmp_arr = [];

        foreach ($arr as $val) {
            if ($type === 1) {
                $tmp_arr[$val[$idx]] = $val;
            } elseif ($type === 2) {
                $tmp_arr[$val[$idx]][] = $val;
            }
        }

        ksort($tmp_arr);
        return $tmp_arr;
    }

    return $arr;
}