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
    return ($tab);
}
if ($argc == 2)
{
    $tab = ft_split($argv[1]);
    $i = 0;
    while ($tab[$i + 1])
    {
        echo $tab[$i]." ";
        $i++;
    }
    echo $tab[$i]."\n";
}
?>