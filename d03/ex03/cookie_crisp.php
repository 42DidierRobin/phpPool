<?php
    switch ($_GET['action'])
    {
        case 'get':
            $cooks = $_COOKIE[$_GET['name']];
            echo $cooks;
            if ($cooks)
                echo "\n";
            break;
        case 'set':
            setcookie($_GET['name'], $_GET['value'],time() + 42*42*42000, null, null, false, true);
            break;
        case 'del':
            setcookie($_GET['name'], '', 1);
            break;
        default :
            break;
    }
?>