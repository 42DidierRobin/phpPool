<?php

    function p_error()
    {
        echo "ERROR\n";
    }
    
    function format($array)
    {
        return ($array['login']."\n".$array['passwd']."\n"."\n");
    }

    $file = "./private/passwd";
    session_start();

    if (file_exist($file))
    {
    } else
    {
        mkdir("./private");

        if ($_SESSION['passwd'] && $_SESSION['login'])
        {
            $_SESSION['passwd'] = $_GET['passwd'];
            $_SESSION['login'] = $_GET['login'];
            file_put_contents($file, format());
        }
        else
            p_error();
    }


?>
