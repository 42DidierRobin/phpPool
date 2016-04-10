<?PHP
    include("handle_data.php");

    function new_article($id, $name, $platform, $img, $resume, $price)
    {
        $content = ft_get_data("../data/article");
        if (!$content)
            $content = array();
        $article['id'] = $id;
        $article['name'] = $name;
        $article['resume'] = $resume;
        $article['paltform'] = array();
        $article['price'] = $price;
        foreach ($platform as $k => $v)
            array_push($article['platform'], $v);
        $article['img'] = $img;
        array_push($content, $article);
        ft_save_data("../data/article", $article);
    }

?>
