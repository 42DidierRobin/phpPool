<?php
function ft_is_sort($tab)
{
    $i = 0;
    $tmp = $tab;
    sort($tmp);
    while ($tab[$i] && ($tab[$i] == $tmp[$i]))
        $i++;
    if ($i == (sizeof($tab)))
        return true;
    else
        return false;
}
?>