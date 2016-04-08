<?php
    session_start();

    if ($_POST['pseudo'] && $_POST['password']){
        $_SESSION['pseudo'] = $_POST['pseudo'];
    }

    if (!$_SESSION['pseudo']) {
        header('Location: test.php');
        exit();
    }
?>

<html>
<head>
    <title>Bonjour</title>
</head>
<body>
    <h1><?php echo $_SESSION['pseudo']; ?></h1>
</body>
</html>