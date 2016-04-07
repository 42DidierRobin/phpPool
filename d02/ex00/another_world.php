#!/usr/bin/php
<?php
    if ($argc >= 2)
    {
        echo preg_replace('/(\s)(.*)(\s)/', '$2', preg_replace('/\s+/', ' ', $argv[1]))."\n";
    }

?>