<?php
include("../data/handle_data.php");

$article = ft_get_data("../data/article");
$i = 0;
while ($article[$i]["id"] != $_POST["id"])
	$i++;
unset($article[$i]);
$article = array_values($article);
ft_save_data("../data/article", $article);
header("Location: ../index.php");
?>