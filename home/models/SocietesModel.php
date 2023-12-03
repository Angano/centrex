<?php
    // Récupération de l'ensemble des societés
    
    require('./models/connect.php');

    $sql = "SELECT rowid,nom FROM llx_societe";
    $societes = $db->query($sql)->fetchAll();

    require('./models/close.php');