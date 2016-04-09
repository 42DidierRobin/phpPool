<?PHP
include("handle_data.php");

if ($_POST["id"] && $_POST["price"])
{
	$article = ft_get_data("article");
	$tab["id"] = $_POST["id"];
	$tab["price"] = $_POST["price"];
	$tab["img"] = $_POST["img"];
	$tab["class"] = $_POST["class"];
	$article[] = $tab;
	ft_save_data("article", $article);
}
?>

<meta charset="UTF-8">
<html>
  <head>
  </head>
  <body>
	<form action="create_article.php" method="post">
	  Designation:<br/>
	  <input type="text" name="id"><br/><br/>
	  Prix:<br/>
	  <input type="number" name="price"><br/><br/>
	  Image:<br/>
	  <input type="url" name="img"><br/><br/>
	  Categories:<br/>
	  <?php include("class_radio.php");?><br/>
	  <input type="submit" name="submit" value="OK">
	</form>
  </body>
</html>
