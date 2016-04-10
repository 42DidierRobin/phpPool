
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creer une session</title>
    <link rel="stylesheet" type="text/css" href="session_create.css"/>
</head>
<body>
    <header>
        <a href="../index.php?platforms=Toutes" class="href header">
            Incredible video games website</a>
    </header>
    <div class="form_box">
        <form action="create.php" method="post">
            <input type="text" class="text_input" placeholder="Pseudo" name="login" id="login"></br>
            <input type="password" class="text_input" placeholder="Mot de passe" name="pwd" id="passwd"></br>
            <input type="password" class="text_input" placeholder="Confirmer Mot de passe" name="pwd2" id="passwd"></br>
            <div class="error">
                <?php  if ($_GET['error'] == 1) {echo "Erreur: veuillez recommencer";}
                        elseif ($_GET['error'] == 2) {echo "Utilisateur déjà existant";} ?>
            </div>
            <input class="button"  type="submit" value="Créer" id="login"></br>
        </form>
    </div>
</body>
</html>