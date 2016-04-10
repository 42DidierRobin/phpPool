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
    <title>Jeux</title>
    <link rel="stylesheet" href="object_index.css">
</head>

<body>
<header>
        <a  href="../index.php?platforms=Toutes" class="hef header">
        Incredible video games website</a>
    </header>
    <div class="page">
<div class="block">
    <img class="large_img" src="'.$object['img']['large'].'" alt="">
    <div class="info">
        <p class="info">
            <p class="info_m">Nom:</br></p> '.$object['name'].'</br>
            <p class="info_m">Platforms:</br></p> '.$platform.'</br>
            <p class="info_m">Prix:</br></p> '.$object['prix'].'</br>
            <p class="info_m">Description:</br></p> '.$object['resume'].'</br></p>';
        echo '<a href="../panier/buy.php?id='.$object['id'].'" class="buy">acheter</a>';
        echo '</div></div></div><div class="user">';
    if ($_SESSION['login'])
    {
        $total = 0;
        echo $_SESSION['login'].($_SESSION['admin'] ? ' (admin)' : '');
        echo '</br><a href="../Session/logout.php">
                <input class="delog" type="button" value="de-log !" ></input></a>
                <p class="panier_titre">panier:</p><div class="panier">';
        if (!$_SESSION['panier'])
            echo 'panier vide';
        else
        {
            foreach ($_SESSION['panier'] as $k => $v)
            {
                echo $v['name'].'</br>';
            }
        }
        echo '</div><a href="../panier/clean.php" class="clean">Vider panier</a></br><p class="panier">Total panier : ';
        if ($_SESSION['panier'])
        {
            foreach ($_SESSION['panier'] as $k => $v)
            {
                $total = $total + $v['prix'];
            }
        }
        echo $total;
        echo '</p></div>';
    } else
    {
        echo "Bonjour";
        echo '</br><a href="../Session/session_index.php">
            <input class="button" type="button" value="Log-in !" ></input></a>';
    }
    echo '</div></div></body>';
    
    ?>

