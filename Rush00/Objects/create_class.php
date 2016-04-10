<?PHP
    include("../data/handle_data.php");

    $class = ft_get_data("../data/platforms");
    if ($_POST["class_name"])
    {
        $class[] = $_POST["class_name"];
    }
    sort($class);
    ft_save_data("../data/platforms", $class);
    header("Location: create_class.html");
?>