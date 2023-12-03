<?php
    require('./models/connect.php');

        $sql = "SELECT * FROM mdpi8535_profil where id=:id";

        $query =$db->prepare($sql);
        $query->bindValue(':id',$argument, PDO::PARAM_STR);
        
        $query->execute();

        $profil = $query->fetch();

    require('./models/close.php');