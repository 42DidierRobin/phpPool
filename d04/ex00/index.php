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
    <style>
        .submit{

        }
    </style>
</header>
<body>
    <form>
        <input type="text" name="login" value="" id="login"></br>
        <input type="password" name="login" value="" id="password"></br>
        <input class="submit" type="submit" name="submit" value="OK" id="submit"></br>
    </form>
</body>
</html>

