<?php

    function p_end($str)
    {
        echo $str."\n";
        exit(1);
    }

    $file = "../ex01/private/passwd";
    session_start();

    if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'])
        p_end('ERROR1');

    $login = $_POST['login'];
    $oldpw = hash('whirlpool',$_POST['oldpw']);
    $newpw = hash('whirlpool',$_POST['newpw']);
    if (file_exists($file))
    {
        $content = unserialize(file_get_contents($file));
        foreach ($content as $k => $v)
        {
            if ($login == $v['login'])
            {
                if ($oldpw != $v['passwd'])
                    p_end('ERROR2');
                else
                {
                    $v['passwd'] = $newpw;
                    file_put_contents($file, serialize($content));
                    p_end('OK');
                }
            }
        }

    }
    else
    {
        p_end('ERROR3');
    }


?>
