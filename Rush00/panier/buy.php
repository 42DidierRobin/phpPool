<?php

    include('panier.php');

    session_start();

    $obj = array();
    $content = ft_get_data('../data/article');
    foreach ($content as $k => $v)
    {
        if ($_GET['id'] == $v['id'])
            $obj = $v;
    }
    add_panier($obj);
    header('Location: ../index.php?platforms=Toutes');
    exit(1);
    ?>
