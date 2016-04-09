<?PHP

    function ft_save_data($path, $data)
    {
        if (file_exists('../data/'.$path))
        {
            $serial = serialize($data);
            $fd = fopen('../data/'.$path, 'a+');
            flock($fd, LOCK_EX);
            file_put_contents('../data/'.$path, $serial);
            flock($fd, LOCK_UN);
            fclose($fd);
        }
    }

    function ft_get_data($path)
    {
        $data = array();
        if (file_exists('../data/'.$path))
        {
            $fd = fopen('../data'.$path, 'a+');
            flock($fd, LOCK_SH);
            $str = file_get_contents('../data/'.$path);
            if ($str !== FALSE)
                $data = unserialize($str);
            flock($fd, LOCK_UN);
            fclose($fd);
        }
        return ($data);
    }

?>