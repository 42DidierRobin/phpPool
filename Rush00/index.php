<?php
    session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceuil</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header>
        Header
        <a class="inscription" href="./Session/session_create.php">S'inscrire</a>
    </header>
    <div class="page">
        <div class="categorie">
            <?php
                include ('generate_list.php');
            ?>
        </div>
        <div class="tableau">
            
        </div>
    </div>
    <div class="user">
        <?php

            if ($_SESSION['login'])
            {
                echo $_SESSION['login']."\n";
                echo '<a href="./Session/logout.php">
            <input class="delog" type="button" value="de-log !" ></input></a>';
            } else
            {
                echo "Bonjour";
                echo '</br><a href="./Session/session_index.php">
            <input class="button" type="button" value="Log-in !" ></input></a>';
            }
        ?>

</body>
</html>