<?php
      


// vérification du format attendu des données
// statut(int)
// rowid(int)

if(preg_match('/^[1-9]{1}[0-9]{0,}$/',$rowid) &&  preg_match('/^[0-1]$/',$statut)){

      require('./models/connect.php');

      $sql = " UPDATE llx_user SET statut=:statut WHERE rowid=:rowid ";
      $query = $db->prepare($sql);

      $query->bindValue(':statut', $statut, PDO::PARAM_INT);
      $query->bindValue(':rowid', $rowid, PDO::PARAM_INT);

      $statutQuery = false;
      if($query->execute()){
            $statutQuery = true;
      };

      require('./models/close.php');
}
      

      
  