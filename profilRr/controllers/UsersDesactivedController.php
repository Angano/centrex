<?php
    $titlePage = 'Utilisteurs désactivités';
    if(checkRole(['superadmin'])){

        require_once('./models/UsersDesactivedModel.php');
        $title = 'Utisitateur Déscativés';


        // Pour la vue, on détermine l'url pour le bouton 'tri des societes'
        // la même vue est utilisée pour visualiser les users actifs et inactifs
        $url_tri = 'usersDesactived';
        

        require_once('./vues/user/users.php');

    }else{
        require_once('./vues/back/index.php');
    }
    