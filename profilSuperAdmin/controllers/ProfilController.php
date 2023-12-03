<?php
if(isset($_SESSION['user_job']) && $_SESSION['user_job']==='superadmin'){


if($_SERVER['REQUEST_METHOD']==='POST'){

    $profil = dataIsValidCreateProfil($_POST);
    if(!in_array(false,$profil)){

        require('./models/ProfilCreateModel.php');

        setMessage('success','profil créée avec succes!');
       
        header('Location:'.APP_URL.'profils');
        die;
       
    }else{
        $profil['intitule'] = $_POST['intitule'];
        $profil['repertoire'] = $_POST['repertoire'];
        $profil['code'] = $_POST['code'];
    }
}

require('./vues/profil/profil.php');

}else{
    
    require('./vues/back/index.php');
}



