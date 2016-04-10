<?PHP
function	ft_get_article($id)
{
	$articles = ft_get_data("../data/article");
	foreach ($articles as $elem)
	{
		if ($elem["id"] == $id)
			return($elem);
	}
}
?>