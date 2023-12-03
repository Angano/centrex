<?php
    // initialisation du titre de la page
    $titlePage = 'Edition d\'un utilisateur';

    //  Vérification si $argument n'est pas null et est un entier
    //  Vérification de la validité des données postées ( isset && !empty + retour des données nettoyés par un trim())
    //  Vérification que l'utilisateur connecté à bien le job de superadmin
    if($argument && checkPost($_SESSION,'user_job') && in_array(checkPost($_SESSION,'user_job'), ['superadmin'])){
       
        //  Si nous avons un post
        if($_SERVER['REQUEST_METHOD']==='POST'){

            // Vérification que les données fournies correspondent aux formats attendus(prg_rex)
            // avec fourniture d'un messsage flash correspondant aux erreurs rencontrées
            $user_update = dataIsValidForUpdateUser($_POST,$argument);
           
            // Si $user_update valide 
            // le login ,n'est pas déjà utilisé
            if($user_update !== false && !IsUsedLogin($user_update['rowid'],$user_update['login'])){
                
                // MAJ de l'utilisateur
                require('./models/UserUpdateModel.php'); 
                setMessage('success','Utilisateur mis à jour');
            }
         
           
        }
        
        // chargement de l'utilisateur ciblé
        require('./models/UserByIdModel.php');

        // chargement de la liste des sociétés
        // require('./models/SocietesModel.php');

        // chargement de la liste de profils pour le formulaire
        require('./models/ProfilsModel.php');

        // chargement de la vue édition de l'utilisateur
        require('./vues/user/editUser.php');
        
    }else{
        //header('location:'.APP_URL.'back/home');

        // si l'utilisateur connecté n'a pas le rôle superadmin, il est redirigé vers une page 
        require('./vues/back/index.php');
    }

?>