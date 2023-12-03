<?php
    require('./models/connect.php');

    $sql = "SELECT COUNT('rowid') FROM llx_user WHERE job=:id";

    $query = $db->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_STR);
    
    $query->execute();

    $profilsPresent = $query->fetch()["COUNT('rowid')"];

    require('./models/close.php');
