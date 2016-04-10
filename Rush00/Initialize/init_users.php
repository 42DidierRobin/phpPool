<?php

    function init_users()
    {
        $a['login'] = 'Robin';
        $a['pwd'] = hash('whirlpool', 'qwerty');
        $a['admin'] = TRUE;
        $a['panier'] = array();
        $b['login'] = 'Romain';
        $b['pwd'] = hash('whirlpool', 'qwerty');;
        $b['admin'] = TRUE;
        $b['panier'] = array();

        ft_save_data('../data/session', array($a, $b));

    }