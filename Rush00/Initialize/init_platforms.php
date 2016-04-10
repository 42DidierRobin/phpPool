<?php

    function init_platforms()
    {
        $list = array();
        $obj = ft_get_data('../data/article');
        foreach ($obj as $k => $v)
        {
            $temp = (array)$v['platforms'];
            if (!$temp)
                continue;
            foreach ($temp as $i => $j)
            {
                if (!array_search($j, $list))
                array_push($list, $j);
            }
        }
        sort($list);
        $list = array_unique($list);
        array_unshift($list, 'Toutes');
        ft_save_data('../data/platforms', $list);
    }