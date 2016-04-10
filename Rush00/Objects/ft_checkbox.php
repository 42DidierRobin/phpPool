<?php
    include("../data/handle_data.php");

    function ft_platform_checkbox()
    {
        $class = ft_get_data("../data/platforms");
        if (count($class) == 0 || $class == NULL)
        {
            echo("Aucune plateforme disponible vous ne pouvez pas creer d'articles");
            return (FALSE);
        }
        echo('<div class="subplatform">');
        foreach ($class as $nb => $elem)
        {
            if ($elem != 'Toutes')
            {
                echo('<input type="checkbox" name="platform'.$nb.'" value="'.$elem.'"> '.$elem.'<br/>');
                if (($nb + 1) % 15 == 0)
                    echo('</div><div class="subplatform">');
            }
        }
        echo('</div><br/>');
        return (TRUE);
    }

?>