<?php 
    require('./models/connect.php');
    
    $sql = " SELECT llx_commande.rowid, fk_soc ,llx_societe.rowid, llx_societe.nom,llx_societe.address, 
                    llx_societe.zip, llx_societe.town,  llx_commande.rowid, llx_commande.ref, llx_commande.fk_statut , todo 
    FROM llx_commande
    INNER join llx_societe on(llx_commande.fk_soc=llx_societe.rowid)
    LEFT JOIN md_todo_with_delivery ON(llx_commande.rowid=md_todo_with_delivery.fk_command)";

    $query = $db->query($sql);
    $commandes = $query->fetchAll();

    require('./models/close.php');