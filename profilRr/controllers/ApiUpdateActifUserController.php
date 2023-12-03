<?php

if( isset($_SESSION['user_job']) && in_array($_SESSION['user_job'], ['superadmin'])){
    $statut = checkPost($_POST,'statut');
    $rowid = checkPost($_POST,'rowid');
    if($statut !=='1'){
        $statut = '0';
    }

    require_once('./models/ApiUpdateActifUserModel.php');

    // on récupère la liste des utilisateur désavtivés
    require_once('./models/UsersDesactivedModel.php');
    $usersDesactived = $users;

    // on récupère la liste des utilisateurs activés
    require_once('./models/UsersModel.php');

    $usersActived = $users;
    $tab = [
        'statut'=>true,
        'userActived'=>$usersActived,
        'userDesactived'=>$usersDesactived,
        'user_job'=>$_SESSION['user_job'],
        'statuQuery'=>$statutQuery
    ];
    echo json_encode($tab);
}

// else{
//     header('Location:'.APP_URL.'/home');
// }