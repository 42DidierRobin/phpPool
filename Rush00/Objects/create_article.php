<?PHP
    include("handle_data.php");

    function new_article($id, $name, $platform, $genre, $img, $resume)
    {
        $content = ft_get_data("../data/article");
        if (!$content)
            $content = array();
        $article['id'] = $id;
        $article['name'] = $name;
        $article['resume'] = $resume;
        $article['platform'] = array();
        foreach ($platform as $k => $v)
            array_push($article['platform'], $v);
        $article['img'] = array();
        foreach ($img as $k => $v)
            array_push($article['img'], $v);
        $article['genre'] = array();
        foreach ($genre as $k => $v)
            array_push($article['genre'], $v);
        array_push($content, $article);
        ft_save_data("../data/article", $article);
    }

?>
