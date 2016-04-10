<?PHP
include("../data/handle_data.php");

$article = ft_get_data("../data/article");

foreach($article as &$elem)
{
	if ($elem["id"] == $_POST["id"])
	{
		if ($_POST["name"])
			$elem["name"] = $_POST["name"];
		if ($_POST["prix"])
			$elem["prix"] = $_POST["prix"];
		if ($_POST["img_small"])
			$elem["img"]["small"] = $_POST["img_small"];
		if ($_POST["img_big"])
			$elem["img"]["large"] = $_POST["img_big"];
		if ($_POST["resume"])
			$elem["resume"] = $_POST["resume"];
		$class = array();
		$c = 0;
		while ($c < 100)
		{
			if ($_POST["platform".$c])
				$class[] = $_POST["platform".$c];
			$c++;
		}
		if (count($class) > 0)
			$elem["platforms"] = $class;
		ft_save_data("../data/article", $article);
		header("Location: ../index.php");
		return (0);
	}
}
echo($_POST["id"]);
?>