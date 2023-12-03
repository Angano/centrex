<?php
    $titlePage ='Users';
    if( isset($_SESSION['user_job']) && in_array($_SESSION['user_job'],['dirigeants', 'rr' ,'rs_itinerant','superadmin'])){
        
        require_once('./models/UsersModel.php');
        $title = 'Utilisateurs Actifs';
        
         // Pour la vue, on détermine l'url pour le bouton 'tri des societes'
        // la même vue est utilisée pour visualiser les users actifs et inactifs
        $url_tri = 'users';

        require_once('vues/user/users.php');
    }else{
        require('./vues/back/index.php');
    }
    
