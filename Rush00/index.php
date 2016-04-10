<?php
    session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceuil</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header>
        <a class="header" href="./index.php?platforms=Toutes" class="hef">
        Incredible video games website</a>
        <a class="inscription" href="./Session/session_create.php">S'inscrire</a>
    </header>
    <div class="page">
        <div class="categorie">
            <div class="categorie_header">
                <p class="categorie">Catégorie</p>
            </div>
            <div class="categorie_list">
                <?php
                    require_once('./index/generate_ctg_list.php');
                ?>
            </div>
        </div>
        <div class="tableau">
            <?php
                require_once('./index/generate_article_list.php');
            ?>
        </div>
    </div>
    <div class="user">
        <?php

            if ($_SESSION['login'])
            {
                echo $_SESSION['login'].($_SESSION['admin'] ? ' (admin)':'');
                echo '</br><a href="./Session/logout.php">
            <input platforms="delog" type="button" value="de-log !" ></input></a>';
            } else
            {
                echo "Bonjour";
                echo '</br><a href="./Session/session_index.php">
            <input platforms="button" type="button" value="Log-in !" ></input></a>';
            }
        ?>

</body>
</html>