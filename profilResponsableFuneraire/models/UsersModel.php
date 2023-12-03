<?php
 // Récupération des user actif en prenant en compte le type de tri

   require('./models/connect.php');

   // Etabissement du mode de tri
   if($more === 'desc'){

    $sql = " SELECT llx_user.rowid, lastname,firstname,fk_soc, job, llx_societe.nom , llx_user.pass_crypted, llx_user.pass, llx_user.statut, llx_user.login, mdpi8535_profil.code
            FROM llx_user
            LEFT JOIN llx_societe ON(llx_user.fk_soc=llx_societe.rowid)
            LEFT JOIN mdpi8535_profil ON(llx_user.job=mdpi8535_profil.id)
            WHERE llx_user.statut = '1'
            ORDER BY llx_societe.rowid
            DESC ";

   }
   else{
    
    $sql = " SELECT llx_user.rowid, lastname,firstname,fk_soc, job, llx_societe.nom , llx_user.pass_crypted, llx_user.pass, llx_user.statut, llx_user.login, mdpi8535_profil.code
        FROM llx_user
        LEFT JOIN llx_societe ON(llx_user.fk_soc=llx_societe.rowid)
        LEFT JOIN mdpi8535_profil ON(llx_user.job=mdpi8535_profil.id)
        WHERE llx_user.statut = '1'
        ORDER BY llx_societe.rowid
            ASC ";
   }

 

    $query = $db->query($sql);
    $users = $query->fetchAll();


    require('./models/close.php');
