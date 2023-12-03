<?php
require('./models/connect.php');

    $sql = "DELETE FROM mdpi8535_profil WHERE `id`=:id";

    $query = $db->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();

require('./models/close.php');
