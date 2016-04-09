<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="session_index.css"/>
</head>
<body>
    <div class="form_box">
        <form action="login.php" method="post">
            <input type="text" class="text_input" placeholder="Pseudo" name="login" id="login"></br>
            <input type="password" class="text_input" placeholder="Mot de passe" name="pwd" id="passwd"></br>
            <div class="error">
                <?php  if ($_GET['error'] == 1) {echo "Erreur: veuillez recommencer";}
                elseif ($_GET['error'] == 2) {echo "Cet utilisateur n'existe pas";} ?>
            </div>
            <input class="button" class="submit_button" type="submit" value="Log in" id="login"></br>
        </form>
        <a href="create.php" class="new_session_link">Creer une session</a>
    </div>
</body>
</html>