<?php
    session_start();

    if ($_SESSION['pseudo']) {
        header('Location: member.php');
    }
?>

<html>
<head>
    <title>Bonjour</title>
</head>
<body>
    <form action="member.php" method="post">
        <input type="text" name="pseudo" value="" placeholder="Pseudo"><br />
        <input type="password" name="password" value="" placeholder="password"><br />
        <input type="submit" name="submit" value="Envoyé">
        <button type="submit">adsasd</button>
    </form>
    <form action="member2.php" method="post">
        <input type="text" name="pseudo" value="" placeholder="Pseudo"><br />
        <input type="password" name="password" value="" placeholder="password"><br />
        <input type="submit" name="submit" value="Envoyé">
        <button type="submit">adsasd</button>
    </form>
</body>
</html>