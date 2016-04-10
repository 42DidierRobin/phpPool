<?php
include("ft_get_article.php");
include("ft_checkbox.php");
include("ft_strclass.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier un article</title>
    <link rel="stylesheet" type="text/css" href="article_modif.css"/>
</head>
<body>
	<header>
		<a  href="../index.php?platforms=Toutes" class="hef header">
			Incredible video games website</a>
	</header>
    <div class="form_box_display">
    	<div class="comp_article_left">
    		<h1>Informations actuelles</h1>
    		<?php
    		$article = ft_get_article($_POST["id"]);
			echo('<div>Identifiant:<br/>'.
				$article["name"].'<br><br/>
				Prix:<br/>'.$article["prix"].'<br/><br/>
				Plateforme:<br/>'.ft_strclass($article["platforms"]).'<br/><br/>"
				Image:<br/>
				<img class="object" src='.$article["img"]["large"].'><br/><br/>
				Resume:<br/>
				'.$article["resume"].'</div>');

    	echo('</div>
    	<div class="comp_article_right">
    		<h1>Entrez les nouvelles informations</h1>
    		<form action="update_base.php" method="post">
    			<input type="hidden" name="id" id="id" value='.$article["id"].'</br>
            	<input type="text" class="text_input" placeholder="Nom" name="name" id="name" ></br>
            	<input type="text" class="text_input" placeholder="Prix" name="prix" id="prix" ><br/>
            	<input type="text" class="text_input" placeholder="Resume" name="resume" id="resume" ></br>
            	<input type="text" class="text_input" placeholder="Url de la vignette" name="img_small" id="img_small" ></br>
            	<input type="text" class="text_input" placeholder="Url de limage" name="img_big" id="img_big" ></br>
            	Plateformes:<br/>
            	<div class="platforms">');
             	ft_platform_checkbox();
             	?>
             	<input type="submit" class="text-input" name="submi" value="modifier" required>
             	</div>
    	</div>
    </div>
</body>
</html>
