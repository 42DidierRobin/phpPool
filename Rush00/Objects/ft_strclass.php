<?php
function	ft_strclass($classes)
{
	$strclass = "";
	foreach($classes as $elem)
	{
		$temp = $strclass;
		$strclass = $temp."<br/>".$elem;
	}
	return ($strclass);
}
?>