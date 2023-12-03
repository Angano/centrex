<?php
if(isset($_SESSION['user_job']) && $_SESSION['user_job']==='superadmin'){

    require('./models/ProfilByIdModel.php');

    if($_SERVER['REQUEST_METHOD']=== 'POST'){

        $profil = dataIsValidCreateProfil();
        $profil['id'] = $_POST['id'];

        require('./models/ProfilUpdateModel.php');
        require('./models/ProfilByIdModel.php');

        if(!in_array(false,$profil)){

            setMessage('success','Mise à jour du profil réussie!');
            header('Location:'.APP_URL.'profils');

            die;
           
        }

        
    }

    require('./vues/profil/updateProfil.php');

}else{
    
    require('./vues/back/index.php');
}

