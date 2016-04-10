<?PHP
include("../data/handle_data.php");

$class = ft_get_data("../data/platforms");
$class[] = $_POST["class_name"];
ft_save_data("../data/platforms", $class);
header("Location: create_class.html");
?>