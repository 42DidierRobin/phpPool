<?php

    include('../data/handle_data.php');

    session_start();
    $content = ft_get_data('session');
    if ($content)
    {
        foreach ($content as $k => $v)
        {
            if ($_POST['login'] == $v['login'])
            {
                if ($v['pwd'] == hash('whirlpool', $_POST['pwd']))
                {
                    $_SESSION = $v;
                    header('Location: ../index.php');
                    exit(1);
                }
                else
                {
                    header('Location: session_index.php?error=1');
                    exit(1);
                }
            }
        }
        header('Location: session_index.php?error=2');
        exit(1);
        
    }
    else
        header('Location: session_create.php');
?>