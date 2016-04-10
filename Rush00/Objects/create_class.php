<?PHP
include("handle_data.php");

$class = ft_get_data("platforms");
$class[] = $_POST["id"];
ft_save_data("platforms", $class);
header("Location: create_class.html");
?>