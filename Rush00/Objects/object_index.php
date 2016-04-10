<?php

    include('../data/handle_data.php');

    session_start();

    $list = ft_get_data('../data/article');

    $object = array();
    foreach ($list as $k => $v)
    {
        if ($v['id'] == $_GET['id'])
            $object = $v;
    }

    $platform = ''.$object['platforms'][0];
    $i = 1;
    while ($object['platforms'][$i])
    {
        $platform = $platform.', '.$object['platforms'][$i];
        $i++;
    }
    
    echo '
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceuil</title>
    <link rel="stylesheet" href="object_index.css">
</head>

<body>
<header>
        Incredible video games website
    </header>
<div class="block">
    <img class="large_img" src="'.$object['img']['large'].'" alt="">
    <div class="info">
        <p class="info">
            <p class="info_m">Nom:</br></p> '.$object['name'].'</br>
            <p class="info_m">Platforms:</br></p> '.$platform.'</br>
            <p class="info_m">Prix:</br></p> '.$object['prix'].'</br>
            <p class="info_m">Description:</br></p> '.$object['resume'].'</br>
        </p>
    </div>
</div></body>';
    
    