<?php
include("../data/handle_data.php");

function    ft_get_new_id()
{
    $i = 0;
    $article = ft_get_data("../data/article");
    foreach ($article as $elem)
    {
        if ($i == 0 || $i == $elem["id"])
            $i++;
    }
    return($i);
}

session_start();

if ($_POST["name"] && $_POST["prix"])
{
    $c = 0;
    $article = ft_get_data("../data/article");
    $tab["id"] = ft_get_new_id();
    $tab["name"] = $_POST['name'];
    $tab["prix"] = $_POST["prix"];
    $img["small"] = $_POST["img_small"];
    $img["large"] = $_POST["img_big"];
    $tab["img"] = $img;
    $tab["resume"] = $_POST["resume"];
    $tabclass = array();
    while ($c < 100)
    {
        if ($_POST["platform".$c])
        {
            $tabclass[] = $_POST["platform".$c];
        }
        $c++;
    }
    $tab["platforms"] = $tabclass;
    $article[] = $tab;
    ft_save_data("../data/article", $article);
}
header('Location: ../index.php');

?>