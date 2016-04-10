<?php

    include ('../data/handle_data.php');
    include ('./init_articles.php');
    include ('./init_platforms.php');
    include ('./init_users.php');

    init_articles();
    init_platforms();
    init_users();
    echo "fin de linitialisation";
    
?>