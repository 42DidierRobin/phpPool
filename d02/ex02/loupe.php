#!/usr/bin/php
<?php
    function title_up($tab)
    {
        return ($tab[1].$tab[2].$tab[3].strtoupper($tab[4]).$tab[5].$tab[6]);
    }
    function rest_up($tab)
    {
        return ($tab[1].$tab[2].strtoupper($tab[3]).$tab[4]);
    }

    function loupe($input)
    {
        $title = '/(<a)(.*)(title=")([^"]*)(.*)(<\/a>)/';
        $rest = '/(<a)([^>]*>)([^<]*)(<.*)/i';
        $result = preg_replace_callback($title, "title_up", $input);
        $result = preg_replace_callback($rest, "rest_up", $result);
        echo $result."\n";
    }

    if ($argc != 2)
        exit (1);
    loupe(file_get_contents($argv[1]));
    exit (1);
?>