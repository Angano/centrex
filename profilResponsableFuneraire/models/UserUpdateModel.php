<?php
// Mise à jour d'un utilisateur
require('./models/connect.php');
// si les données de $user sont valides, on mets à jours

if($user_update!=='false'){
   
    $sql = " UPDATE llx_user set
        login=:login,
        email=:email,
        civility=:civility,
        firstname=:firstname,
        lastname=:lastname,
        address=:address,
        zip=:zip,
        town=:town,
        statut=:statut,
        job=:job
        WHERE rowid=:rowid";

    $query = $db->prepare($sql);

    $query->bindValue(':login',$user_update['login'],PDO::PARAM_STR);
    $query->bindValue(':email',$user_update['email'],PDO::PARAM_STR);
    $query->bindValue(':civility',$user_update['civility'],PDO::PARAM_STR);
    $query->bindValue(':firstname',$user_update['firstname'],PDO::PARAM_STR);
    $query->bindValue(':lastname',$user_update['lastname'],PDO::PARAM_STR);
    $query->bindValue(':address',$user_update['address'],PDO::PARAM_STR);
    $query->bindValue(':zip',$user_update['zip'],PDO::PARAM_STR);
    $query->bindValue(':town',$user_update['town'],PDO::PARAM_STR);
    $query->bindValue(':statut',intval($user_update['statut'],PDO::PARAM_BOOL));
    $query->bindValue(':rowid',intval($user_update['rowid']),PDO::PARAM_INT);

    // job peut être soit null soit un entier
    if($user_update['job']==='null'){
        $query->bindValue(':job',$user_update['job'],PDO::PARAM_NULL);
    }else{
        $query->bindValue(':job',$user_update['job'],PDO::PARAM_INT);
    }
    

    $query->execute();

}
require('./models/close.php');

?>