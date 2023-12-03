<?php
     // vérification du format attendu des données
     // $argument(int)

require('./models/connect.php');

if(preg_match('/^[1-9]{1}[0-9]{0,}$/',$argument)){

    $sql = "SELECT llx_user.rowid, llx_user.login, llx_user.statut, llx_user.job, llx_user.fk_soc, llx_user.civility, llx_user.firstname, 
                llx_user.lastname, llx_user.address, llx_user.zip, llx_user.town, llx_user.email, llx_user.office_phone, llx_user.user_mobile, llx_societe.nom,  
                mdpi8535_profil.repertoire AS repertoire
                FROM llx_user 
                left JOIN llx_societe ON(fk_soc=llx_societe.rowid)
                LEFT JOIN mdpi8535_profil ON(llx_user.job=mdpi8535_profil.id)
                WHERE llx_user.rowid=:rowid";

    $query = $db->prepare($sql);
    $query->bindValue(':rowid',$argument,PDO::PARAM_STR);

    $query->execute();
    $user = $query->fetchAll();

    // test Nombre retour
    if(count($user)===1){
        $user = $user[0];
    }  
    
}
require('./models/close.php');



    