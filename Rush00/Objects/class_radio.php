<?php
$class = ft_get_data("class");
if (count($class) == 0)
	echo("Aucune categorie disponible");
foreach($class as $elem)
	echo('<input type="radio" name="class" value="'.$elem.'"> '.$elem.'<br/>');
?>