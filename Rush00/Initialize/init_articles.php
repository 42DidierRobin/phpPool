<?php

    include ('new_article.php');

    function init_articles()
    {
        //C'est ici quon va creer les fichiers session, platforms et articles pour les donnees du site (equivalent de la base de donnee).
        $api_key = '024dc51016e6ff6b084adc72935918bd8df42b84';
        $field_list = '&field_list=id,name,platforms,image,deck';

        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36"
            )
        );
        $context = stream_context_create($opts);

        for ($i = 0; $i < 200; $i++)
        {
            $temp = 'http://www.giantbomb.com/api/game/3030-'.(4042 + $i).'/?api_key='.$api_key.'&format=JSON'.$field_list;
            $a = (array)json_decode(file_get_contents($temp, false, $context));
            if ($a['error'] != 'OK')
                $i++;
            else
            {
                $a = (array)$a['results'];
                $platforms = array();
                $temp = (array)($a['platforms']);
                if (!$temp || !$a['deck'])
                {
                    $i++;
                    echo $i.' a ete refuse car il na pas de platform ou de descriptions //'."\n";
                    continue;
                }
                foreach ($temp as $k => $v)
                {
                    $v = (array)($v);
                    array_push($platforms, $v['name']);
                }
                $temp = (array)($a['image']);
                if (!$temp['icon_url'] || !$temp['super_url'])
                {
                    $i++;
                    echo $i.' a ete refuse car il na pas d\'image //'."\n";
                    continue;
                }
                $img['small'] = $temp['icon_url'];
                $img['large'] = $temp['super_url'];
                new_article($a['id'], $a['name'], $platforms, $img, $a['deck'], rand(500, 3000) / 100);
            }
        }
        echo "--->Fin de la generation de donne.\n";
        //$content = ft_get_data('../data/article');
        //print_r($content);
    }
