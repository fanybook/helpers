<?php

date_default_timezone_set('Asia/Shanghai');

// demo
echo smart_time('2017-10-24 00:00:00'), "\n";
echo smart_time('2017-6-14'), "\n";


/**
 * 把明确时间转化成智能时间（例如：3秒前，5天前）
 * @param  string $str 代表时间的字符串
 * @return string      智能时间（例如：3秒前，5天前）
 */
function smart_time($str, $days = 30)
{
    $ts = strtotime($str);
    $passed = time() - $ts;

    // 未来的时间或超过$days天，显示真是日期
    if ($passed < 0 || $passed >= 60*60*24*$days) {
        return date('Y-m-d', $ts);
    }

    // 小于1分钟，显示秒
    if ($passed < 60) {
        return $passed . '秒前';
    // 小于1小时，显示分钟
    } elseif ($passed < 60*60) {
        $minute = floor($passed / 60);
        return $minute . '分钟前';
    // 小于1天，显示小时
    } elseif ($passed < 60*60*24) {
        $hour = floor($passed / (60*60));
        return $hour . '小时前';
    }

    // 小于1个月，显示天数
    $day = floor($passed / (60*60*24));
    return $day . '天前';
}