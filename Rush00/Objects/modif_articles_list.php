<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier/Supprimer un article</title>
    <link rel="stylesheet" type="text/css" href="../index.css"/>
</head>
<body>
    <header>
        <a href="../index.php?platforms=Toutes" class="hef header">
            Incredible video games website</a>
    </header>
    <div class="form_box_display">
        <?php
            include("../data/handle_data.php");
            include("ft_strclass.php");
            $articles = ft_get_data("../data/article");
            echo("<table>");
            foreach ($articles as $elem)
            {
                echo('<tr><td>'.$elem["name"].'</td>');
                echo('<td>'.ft_strclass($elem["platforms"]).'</td>');
                echo('<td>'.$elem["prix"].'</td>');
                echo('<td><form action="article_modif.php" method="post"><input type="hidden" name="id" value="'.$elem["id"].'"><input type="submit" name="submit" value="Modifier"></form></td>');
                echo('<td><form action="delete_article.php" method="post"><input type="hidden" name="id" value="'.$elem["id"].'"><input type="submit" name="submit" value="Supprimer"></form></td></tr>');
            }
            echo("</table>");
        ?>
    </div>
</body>
</html>