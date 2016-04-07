#!/usr/bin/php
<?php

    function error()
    {
        echo "Wrong format\n";
        exit(1);
    }

    function to_day($input)
    {
        if (!preg_match(
                '/([Ll]undi)|([mM]ardi)|([Mm]ercredi)|([jJ]eudi)|([vV]endredi)|([Ss]amedi)|([Dd]imanche)|/',
                $input)
        )
            error();
    }

    function to_month($input)
    {
        switch (true)
        {
            case preg_match('/[jJ]anvier/', $input):
                return ("01");
            case preg_match('/[fF][ée]vrier/', $input):
                return ("02");
            case preg_match('/[Mm]ars/', $input):
                return ("03");
            case preg_match('/[Aa]vril/', $input):
                return ("04");
            case preg_match('/[mM]ai/', $input):
                return ("05");
            case preg_match('/[jJ]uin/', $input):
                return ("06");
            case preg_match('/[jJ]uillet/', $input):
                return ("07");
            case preg_match('/[aA]o[uû]t/', $input):
                return ("08");
            case preg_match('/[Ss]eptembre/', $input):
                return ("09");
            case preg_match('/[oO]ctobre/', $input):
                return ("10");
            case preg_match('/[nN]ovembre/', $input):
                return ("11");
            case preg_match('/[dD][ée]cembre/', $input):
                return ("12");
            default:
                error();
        }
    }

    function to_sec($input)
    {
        if (!preg_match('/([0-2][0-9]):([0-5][0-9]):([0-5][0-9])/', $input, $time))
            error();
        else
        {
            if ($time[1] > 24)
                error();
            return ($time);
        }
    }

    if ($argc == 2)
    {
        preg_match('/(\w+)\s(\d{1,2})\s(\w+)\s(\d{4})\s(\d{2}:\d{2}:\d{2})/', $argv[1], $array);
        to_day($array[1]);
        if (($date = $array[2]) > 31)
            error();
        $month = to_month($array[3]);
        if (($year = $array[4]) < 1970)
            error();
        $hour = to_sec($array[5]);
        date_default_timezone_set("Europe/Paris");
        echo (mktime($hour[1], $hour[2], $hour[3], $month, $date, $year))."\n";
    } else
        exit(1);
?>