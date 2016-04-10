<?php

    function init_users()
    {
        $a['login'] = 'Robin';
        $a['pwd'] = hash('whirlpool', 'qwerty');
        $a['admin'] = TRUE;
        $b['login'] = 'Romain';
        $b['pwd'] = hash('whirlpool', 'qwerty');;
        $b['admin'] = TRUE;
        ft_save_data('../data/session', array($a, $b));

    }