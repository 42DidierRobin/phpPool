<?php
    require_once('./data/handle_data.php');
    $content = ft_get_data('./data/article');

    if (!$_GET['platforms'] || $_GET['platforms'] == 'Toutes')
    {
        foreach ($content as $k => $v)
        {
                echo '<a href="./Objects/object_index.php?id='.$v['id'].'" class="href"><div class="article">
                <img class="object" src="'.$v['img']['small'].'" alt="">
                <p class="object">'.$v['name'].'</p></div></a>';
        }
        echo '</ul>';
    }
    else
    {
        //on genere le code html pour la liste des categories
        foreach ($content as $k => $v)
        {
            if (array_search($_GET['platforms'], $v['platforms']))
            {
                echo '<a href="./Objects/object_index.php?id='.$v['id'].'" class="href"><div class="article">
                <img class="object" src="'.$v['img']['small'].'" alt="">
                <p class="object">'.$v['name'].'</p></div></a>';
            }
        }
        echo '</ul>';
    }
?>

