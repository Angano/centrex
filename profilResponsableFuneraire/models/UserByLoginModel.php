<?php
    require('./models/connect.php');

    

    // Vérification du format attendu de la donnée
    // Format attendu: alphanumérique
    if(preg_match('/^[a-zA-Z0-9-_]{0,}$/',$login)){
        $sql = "SELECT * 
                FROM llx_user
                inner join mdpi8535_profil 
                ON (mdpi8535_profil.id = llx_user.job)
                WHERE (llx_user.login=:login and llx_user.statut='1') ";

        $query = $db->prepare($sql);
        $query->bindValue(':login',$login,PDO::PARAM_STR);

        $query->execute();
        $user_login = $query->fetchAll();

        // test Nombre retour
        if(count($user_login)===1){
            $user_login = $user_login[0];

        }else{
            $user_login = false;
        }
        }
    else{
     
        $user_login = false;
    
    }



   
    require('./models/close.php');