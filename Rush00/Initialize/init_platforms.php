<?php
    
    function init_platforms()
    {
        $list = array('Toutes');
        $obj = ft_get_data('../data/article');
        foreach($obj as $k => $v)
        {
            $temp = (array)$v['platforms'];
            foreach ($temp as $k =>$v)
            {
                if (!array_search($v, $list))
                    array_push($list, $v);
            }
        }
        sort($list);
        ft_save_data('../data/platforms', $list);
    }