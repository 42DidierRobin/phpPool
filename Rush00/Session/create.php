<?php

    include('../data/handle_data.php');

    session_start();
    $file = "../data/session";

    if (!$_POST['login'] || !$_POST['pwd'] || $_POST['pwd'] != $_POST['pwd2'])
    {
        header('Location: session_create.php?error=1');
        exit(1);
    }

    $login = $_POST['login'];
    $pwd = hash('whirlpool', $_POST['pwd']);
    $content = ft_get_data($file);

    if ($content)
    {
        foreach ($content as $k => $v)
        {
            if ($login == $v['login'])
            {
                header('Location: session_create.php?error=2');
                exit(1);
            }
        }
    }
    $_SESSION['pwd'] = $pwd;
    $_SESSION['login'] = $login;
    $_SESSION['admin'] = FALSE;
    $_SESSION['panier'] = array();
    
    if (!$content)
        $content = array($_SESSION);
    else
        array_push($content, $_SESSION);
    ft_save_data($file, $content);
    header('Location: ../index.php');

?>