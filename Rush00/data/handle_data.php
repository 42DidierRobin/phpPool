<?PHP

    function ft_save_data($path, $data)
    {
        if (file_exists($path))
        {
            $serial = serialize($data);
            $fd = fopen($path, 'a+');
            flock($fd, LOCK_EX);
            file_put_contents($path, $serial);
            flock($fd, LOCK_UN);
            fclose($fd);
        }
    }

    function ft_get_data($path)
    {
        $data = array();
        if (file_exists($path))
        {
            $fd = fopen($path, 'a+');
            flock($fd, LOCK_SH);
            $str = file_get_contents($path);
            if ($str !== FALSE)
                $data = unserialize($str);
            flock($fd, LOCK_UN);
            fclose($fd);
        }
        return ($data);
    }

?>