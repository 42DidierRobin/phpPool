#!/usr/bin/php
<?php
while (42)
{
    echo("Entrez un nombre: ");
    $std_in = fopen("php://stdin", "r");
    $line = fgets($std_in);
    $line = substr($line, 0, -1);

    if ($line == "0")
        echo "Le chiffre 0 est Pair";
    else 
    {
        $nbr = (int)$line;
        if ($nbr != 0) 
        {
            if ($nbr % 2 == 0)
                echo "Le chiffre $nbr est Pair";
            else
                echo "Le chiffre $nbr est Impair";
        } else
            echo "'$line' n'est pas un chiffre";
    }
    echo "\n";
}
?>