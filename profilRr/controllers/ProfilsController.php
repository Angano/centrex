<?php
    if($_SESSION['user_job']==='superadmin'){

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $id = checkPost($_POST,'id');
            if($id!==false){

                // Afin d'éviter une erreur:
                // Avant d'effacer le profil, on vérifie la présence où non d'un user avec le profil
                require('./models/ProfilIsEmptyOfUserModel.php');
                if($profilsPresent==='0'){

                    require('./models/ProfilDeleteModel.php');
                    setMessage('success','Le profil est supprimé!'); 

                }else{
                    setMessage('danger', 'Impossible de supprimer ce profil<br>Il existe des utilisateurs utilisant ce profil');
                }
                
            }
        }

        require('./models/ProfilsModel.php');
        require('./vues/profil/profils.php');

    }else{
        require('./vues/back/index.php');
        die;
    }

    