<?php
    session_start();
    session_unset();
    session_destroy();

    setMessage('success','Vous êtes déconnecté');
    die;
    header('Location:'.DOMAINE.'/home/login');