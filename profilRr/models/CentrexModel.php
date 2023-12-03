<?php

// Vérification du format attendu de rowid(int)
if(preg_match('/^[1-9]{1}[0-9]{0,}$/',$argument)){

    require('./models/connect.php');
    
    $sql = "SELECT * FROM centrex_data
    INNER JOIN llx_societe ON(centrex_data.fk_llx_soc=llx_societe.rowid)
    WHERE fk_llx_soc=:id";

    $query = $db->prepare($sql);
    $query->bindValue(':id',$argument,PDO::PARAM_INT);
    $query->execute();

    $societe = $query->fetch();

    require('./models/close.php');
}


    
