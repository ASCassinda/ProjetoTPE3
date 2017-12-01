<?php

    session_start();
    $_SESSION['idUtilizador'];
    unset($_SESSION['idUtilizador']);
    session_destroy();
    
    header("Location: ../?login=off");
    
    # unset($_SESSION['idUtilizador']);