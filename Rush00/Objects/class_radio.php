<?php
$class = ft_get_data("platforms");
if (count($class) == 0)
	echo("Aucune categorie disponible");
foreach($class as $elem)
	echo('<input type="radio" name="platforms" value="'.$elem.'"> '.$elem.'<br/>');
?>