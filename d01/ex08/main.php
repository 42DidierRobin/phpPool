#!/usr/bin/php
<?php

include("ft_is_sort.php");

$tab = array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz");
$tab[] = "Et qu’est-ce qu’on fait maintenant ?";

$tab1 = array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz");
$tab2 = array("Z", "a", "b", "c", "d");

if (ft_is_sort($tab))
    echo "Le tableau est trie\n";
else
    echo "Le tableau n’est pas trie\n";

if (ft_is_sort($tab1))
    echo "Le tableau est trie\n";
else
    echo "Le tableau n’est pas trie\n";

if (ft_is_sort($tab2))
    echo "Le tableau est trie\n";
else
    echo "Le tableau n’est pas trie\n";


?>