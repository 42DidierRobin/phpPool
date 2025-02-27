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
        <a href="./index.php?platforms=Toutes" class="hef header">
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
                $total = 0;
                echo '<p class="panier_titre">'.$_SESSION['login'].($_SESSION['admin'] ? ' (admin)' : '').'</p>';
                echo '</br><p class="panier_titre">panier:</p><div class="panier">';
                if (!$_SESSION['panier'])
                    echo 'panier vide';
                else
                {
                    foreach ($_SESSION['panier'] as $k => $v)
                    {
                        echo $v['name'].'</br>';
                    }
                }
                echo '</div><a href="./panier/clean.php" class="clean">Vider panier</a></br><p class="panier">Total panier : ';
                if ($_SESSION['panier'])
                {
                    foreach ($_SESSION['panier'] as $k => $v)
                    {
                        $total = $total + $v['prix'];
                    }
                }
                echo $total.'</p>';
                echo '</p>';
                echo '<a href="./Session/logout.php"><input class="delog" type="button" value="de-log !" ></input></a>';
                if ($_SESSION['admin'])
                {
                    echo('</br></br><a class="action" href="Objects/article_create.php">Ajouter un jeu</a><br/></br>
                        <a class="action" href="Objects/create_class.php">Ajouteur une Platforme</a></br></br>
                        <a class="action" href="Objects/modif_articles_list.php">Modifier un jeu</a>');
                }
            } else
            {
                echo "Bonjour";
                echo '</br><a href="./Session/session_index.php"><input class="button" type="button" value="Log-in !" ></input></a>';
            }
        ?>

    </div>

</body>
</html>