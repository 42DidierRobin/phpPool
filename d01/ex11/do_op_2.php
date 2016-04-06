#!/usr/bin/php
<?php
    function clean_space($string)
    {
        $i = 0;
        $c = '';
        $res = "";

        while ($string[$i])
        {
            $c = $string[$i];
            if ($c != " ")
                $res = $res.$c;
            $i++;
        }
        return ($res);
    }

    $i = 0;
    $new = "";
    $a = "";
    $b = "";
    $op = "";
    $check = true;
    $nbr = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $sign = ['+', '%', '*', '-', '/'];

    if ($argc != 2)
        echo "Incorrect Parameters\n";
    else
    {
        $new = clean_space($argv[1]);
        while (in_array($new[$i], $nbr))
        {
            $a = $a.$new[$i];
            $i++;
        }
        if (in_array($new[$i], $sign))
            $op = $new[$i];
        else
            $check = false;
        $i++;
        while (in_array($new[$i], $nbr))
        {
            $b = $b.$new[$i];
            $i++;
        }
        if ($new[$i] || $a == '' || $b == '' || $op == '')
            $check = false;
        if ($check)
        {
            switch ($op)
            {
                case "+":
                    echo ($a + $b)."\n";
                    break;
                case "%":
                    echo ($a % $b)."\n";
                    break;
                case "/":
                    echo ($a / $b)."\n";
                    break;
                case "*":
                    echo ($a * $b)."\n";
                    break;
                case "-":
                    echo ($a - $b)."\n";
                    break;
            }
        }
        else
            echo "Syntax Error\n";
    }
?>
