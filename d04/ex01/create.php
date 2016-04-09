<?php

    function p_end($str)
    {
        echo $str."\n";
        exit(1);
    }

    $file = "./private/passwd";
    session_start();
    $login = $_POST['login'];
    $passwd = hash('whirlpool',$_POST['passwd']);

    if (!$login || !$_POST['passwd'])
        p_end('ERROR');

    if (file_exists($file))
    {
        $content = unserialize(file_get_contents($file));
        foreach ($content as $k => $v)
        {
            if ($login == $v['login'])
                p_end('ERROR');
        }
        $_SESSION['passwd'] = $passwd;
        $_SESSION['login'] = $login;
        array_push($content, $_SESSION);
        file_put_contents($file, serialize($content));
        p_end('OK');
    }
    else
    {
        mkdir("./private");

        if ($_POST['passwd'] && $_POST['login'] && $_POST['submit'] == 'OK')
        {
            $_SESSION['passwd'] = $passwd;
            $_SESSION['login'] = $login;
            array($_SESSION['login'], $_SESSION['passwd']);
            file_put_contents($file, serialize(array($_SESSION)));
            p_end('OK');
        }
        else
            p_end('ERROR');
    }


?>
