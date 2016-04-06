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
            $new_str = substr($string, 0, $pos);
            $len = strlen($string);
            $string = substr($string, $pos, $len);
            while (substr($string, 0, 1) == " ")
            {
                $string = substr($string, 1, $len - 1);
                $len--;
            }
            array_push($tab, $new_str);
        }
        if (strlen($string))
            array_push($tab, $string);
        sort($tab);
        return ($tab);
    }

    $a = "";
    $b = "";
    $c = "";
    $res = 0;

    if ($argc != 4)
        echo "Incorrect Parameters\n";
    else
    {
        $a = ft_split($argv[1])[0];
        $b = ft_split($argv[2])[0];
        $c = ft_split($argv[3])[0];
        
        if ($b[0] == '+')
            $res = $a + $c;
        elseif ($b[0] == '-')
            $res = $a - $c;
        elseif ($b[0] == '*')
            $res = $a * $c;
        elseif ($b[0] == '/')
            $res = $a / $c;
        elseif ($b[0] == '%')
            $res = $a % $c;
        else
        {
            echo "Incorrect Parameters\n";
            exit();
        }
        echo $res."\n";
    }
?>