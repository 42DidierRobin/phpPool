<?php

    require_once('./data/handle_data.php');
    $content = ft_get_data('./data/class');
    //on genere le code html pour la liste des categories
    foreach ($content as $k => $v)
    {
        echo '<label class="categorie"><input type="radio" value="choix'.$k.'">';
        echo $v.'</label></br>';
    }
    echo '</ul>';
?>