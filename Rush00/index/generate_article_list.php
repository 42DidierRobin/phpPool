<?php
    require_once('./data/handle_data.php');
    $content = ft_get_data('./data/article');

    //on genere le code html pour la liste des categories
    foreach ($content as $k => $v)
    {
        echo '<div class="article">
                <img class="object" src="'.$v['img'].'" alt="">
                <p class="object">'.$v[id].'</p></div>';
    }
    echo '</ul>';