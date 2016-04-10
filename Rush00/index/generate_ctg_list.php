<?php

    require_once('./data/handle_data.php');
    $content = ft_get_data('./data/platforms');
    //on genere le code html pour la liste des categories
    foreach ($content as $k => $v)
    {
        echo '<a class="categorie_lien" href="./index.php?platforms='.$v.'">'.$v.'</br></br></a>';
    }
    echo '</ul>';
?>

