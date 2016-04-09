<?php
    session_start();
    function auth($login, $p)
    {
        $file = '../ex01/private/passwd';
        $passwd = hash('whirlpool', $p);
        if (file_exists($file))
        {
            $content = unserialize(file_get_contents($file));
            foreach ($content as $k => $v)
            {
                if ($login == $v['login'])
                {
                    if ($passwd != $v['passwd'])
                        return (false);
                    return (true);
                }
            }
        }
        
        return (false);
    }
?>