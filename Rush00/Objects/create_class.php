<?PHP
include("handle_data.php");

$class = ft_get_data("class");
$class[] = $_POST["id"];
ft_save_data("class", $class);
header("Location: create_class.html");
?>