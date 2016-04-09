<?php
    session_start();
    if (!$_SESSION['login'] && $_GET['submit'] == 'OK')
    {
        $_SESSION['login'] = $_GET['login'];
        $_SESSION['passwd'] = $_GET['passwd'];
    }
?>

<html lang="en">
<header>
    <title>Index.php</title>
</header><body>
    <form>
        Identifiant: <input type="text" name="login" value="sb" id="login">
        </br>
        Mot de passe: <input type="password" name="passwd" value="beeone" id="passwd">
        <input class="submit" type="submit" name="submit" value="OK" id="submit">
    </form>
</body></html>

