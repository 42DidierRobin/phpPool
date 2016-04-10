<?php

    include('../Objects/create_article.php');

    //C'est ici quon va creer les fichiers session, class et articles pour les donnees du site (equivalent de la base de donnee).
    $api_key = '024dc51016e6ff6b084adc72935918bd8df42b84';
    $field_list = '&field_list=platform';

    $opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36"
        )
    );
    $context = stream_context_create($opts);


    $temp = 'http://www.giantbomb.com/api/games/3030-4725/?api_key='.$api_key.'&format=JSON'.$field_list;
    $a = (array)json_decode(file_get_contents($temp, false, $context));
    if ($a['error'] != 'OK')
        echo 'error';
    else
    {
        $a = (array)$a['results'];
        $platform = array();
        $genre = array();
        $img = array();
        //foreach ($a['platform'], )
        new_article($a['id'], $a['name'], $platform, $genre, $img, 'temp');
    }
    print_r($a);
