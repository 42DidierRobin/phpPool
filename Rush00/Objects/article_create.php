
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creer un article</title>
    <link rel="stylesheet" type="text/css" href="../index.css"/>
</head>
<body>
    <header>
        <a  href="../index.php?platforms=Toutes" class="hef header">
            Incredible video games website</a>
    </header>
    <div class="form_box_create">
        <form action="create.php" method="post">
            <input type="text" class="text_input" placeholder="Nom" name="name" id="name" required></br>
            <input type="text" class="text_input" placeholder="Prix" name="prix" id="prix" required><br/>
            <input type="text" class="text_input" placeholder="Resume" name="resume" id="resume" required></br>
            <input type="text" class="text_input" placeholder="Url de la vignette" name="img_small" id="img_small" ></br>
            <input type="text" class="text_input" placeholder="Url de l'image" name="img_big" id="img_big" ></br>
            Plateformes:<br/>
            <div class="platforms">
                <?php
                include("ft_checkbox.php");
                if (ft_platform_checkbox() == TRUE)
                {   
                    echo('<br/><input class="action_button" type="submit" name="submit" value="Creer" required><br/><br/>');
                    echo('<a class="action" href="modif_articles_list.php">Modifier un article</a>');
                }
                echo('<br/><br/><a class="action" href="create_class.html">Creer une Plateforme</a>');
                ;?> 
            </div>
            <div class="error">
                <?php  if ($_GET['error'] == 1) {echo "Erreur: veuillez recommencer";}
                        elseif ($_GET['error'] == 2) {echo "Utilisateur déjà existant";} ?>
            </div>
        </form>
    </div>
</body>
</html>