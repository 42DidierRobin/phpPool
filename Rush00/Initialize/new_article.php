<?PHP

    function new_article($id, $name, $platform, $img, $resume, $prix)
    {
        $content = ft_get_data("../data/article");
        if (!$content)
            $content = array();
        $article['id'] = $id;
        $article['name'] = $name;
        $article['resume'] = $resume;
        $article['platforms'] = array();
        foreach ($platform as $k => $v)
            array_push($article['platforms'], $v);
        $article['img'] = array();
        $article['img']['small'] = $img['small'];
        $article['img']['large'] = $img['large'];
        $article['prix'] = $prix;
        array_push($content, $article);
        ft_save_data("../data/article", $content);
    }

?>
