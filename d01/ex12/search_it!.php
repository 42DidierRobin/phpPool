#!/usr/bin/php
<?php

if ($argc > 2)
{
    $key = $argv[1];
 
    foreach ($argv as $k => $v)
    {
        if ($k > 1)
        {
            $i = 0;
            
            $k_tmp = "";
            $v_tmp = "";
            while ($v[$i])
            {
                if ($v[$i] == ':')
                {
                    $i++;
                    while ($v[$i])
                    {
                        $v_tmp = $v_tmp.$v[$i];
                        $i++;
                    }
                    break;
                }
                $k_tmp = $k_tmp.$v[$i];
                $i++;
            }
            if ($k_tmp == $key)
                echo $v_tmp."\n";
        }
    }
}
?>