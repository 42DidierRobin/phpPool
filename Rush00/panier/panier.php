<?php

    session_start();
    include('../data/handle_data.php');

    function add_panier($object)
    {
        $content = ft_get_data('../data/session');
        if (!$_SESSION['panier'])
            $_SESSION['panier'] = array();
        if ($object)
        {
            array_push($_SESSION['panier'], $object);
            foreach ($content as $k => $v)
            {
                if ($v['login'] = $_SESSION['login'])
                    $v['panier'] = $_SESSION['panier'];
            }
            ft_save_data('../data/session', $content);
        }
    }

    function clear_panier()
    {
        $_SESSION['panier'] = array();
        $content = ft_get_data('../data/session');
        foreach ($content as $k => $v)
        {
            if ($v['login'] = $_SESSION['login'])
                $v['panier'] = $_SESSION['panier'];
        }
        ft_save_data('../data/session', $content);
    }