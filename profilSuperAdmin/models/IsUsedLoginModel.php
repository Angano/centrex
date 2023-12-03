<?php
    

     // Vérification du format attendu de la donnée;
     // $rowidUpdateUser(int)
     // $loginUpdateUser(str)
 require('./models/connect.php');
    if(preg_match('/^[1-9]{1}[0-9]{0,}$/',$rowidUpdateUser) && preg_match('/^[a-zA-Z0-9-_.]{0,}$/',$loginUpdateUser)){
       
        
        $sql = "SELECT * FROM llx_user where rowid!=:rowid and login=:login ";
        $query = $db->prepare($sql);

        $query->bindValue(':rowid',$rowidUpdateUser,PDO::PARAM_INT);
        $query->bindValue(':login',$loginUpdateUser,PDO::PARAM_STR);
        $query->execute();
        $isUsedLogin = $query->fetch();

        
    }else{
        echo $rowidUpdateUser.'__'.$loginUpdateUser;
        
    }
  
require('./models/close.php');
    