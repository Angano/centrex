<?php
$titlePage = 'Login';
$user_login = false; 

// Si djà un utilisateur connecté, on redirige vers home
 if(checkPost($_SESSION,'user_job')){
    echo 'location:../'.$user_login["repertoire"].'/home';
    die;
    header('location:../'.$user_login["repertoire"].'/home');    }

if(($login  = checkPost($_POST,'login')) && ($_SERVER['REQUEST_METHOD']==='POST')){
 
    // on récupère $user_login
    require('./models/UserByLoginModel.php');

  
    if($user_login){
        $_SESSION['user_job'] = $user_login['code'];
        $_SESSION['login'] = $user_login['login'];
        $_SESSION['user_id'] = $user_login['rowid'];
        $_SESSION['isIdentified'] = true;
    
        // Redirection vers le repertoire en fonction du job
        setMessage('success','Vous êtes connecté');
        header('location:../'.$user_login["repertoire"].'/home');
        die;
    }else{
    setMessage('danger', 'Compte inconnu ou mot de passe non valide');
    header('Location:'.DOMAINE.'home/login');
       die;
    }

   
   
}

require_once('vues/log.php');


