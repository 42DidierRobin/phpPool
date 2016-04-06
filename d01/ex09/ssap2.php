#!/usr/bin/php
<?php
function ft_split($string)
{
    $pos = 1;
    $new_str = "";
    $tab = [];
    $len = strlen($string);

    while (substr($string, 0, 1) == " ")
    {
        $string = substr($string, 1, $len - 1);
        $len--;
    }
    while ($pos = strpos($string, ' '))
    {
        $new_str =  substr($string, 0, $pos);
        $len = strlen($string);
        $string = substr($string, $pos, $len);
        while (substr($string, 0, 1) == " ")
        {
            $string = substr($string, 1, $len - 1);
            $len--;
        }
        array_push($tab, $new_str);
    }
    if(strlen($string))
        array_push($tab, $string);
    sort($tab);
    return ($tab);
}

$i = 1;
$j = 0;
$char0 = '';
$res = [];
$tmp = [];
$nbr = [];
$sign = [];
$alpha = [];

while ($argv[$i]) {
    $tmp = ft_split($argv[$i]);
    while ($tmp[$j])
    {
        $char0 = ord($tmp[$j]);
        if (64 < $char0 && $char0 < 91)
            array_push($alpha, $tmp[$j]);
        elseif (96 < $char0 && $char0 < 122)
            array_push($alpha, $tmp[$j]);
        elseif (47 < $char0 && $char0 < 58)
            array_push($nbr, $tmp[$j]);
        else
            array_push($sign, $tmp[$j]);
        $j++;
    }
    $j = 0;
    $i++;
}
sort($nbr, SORT_STRING);
sort($sign);
natcasesort($alpha);
$res = array_merge($alpha, $nbr, $sign);
$i = 0;
if ($argc > 1)
{
    while ($res[$i])
    {
        echo $res[$i] . "\n";
        $i++;
    }
}
?>