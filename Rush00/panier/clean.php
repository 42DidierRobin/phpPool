<?php

    include('panier.php');

    session_start();

    clear_panier();
    
    header('Location: ../index.php?platforms=Toutes');
    exit(1);
?>
