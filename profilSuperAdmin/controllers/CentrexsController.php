<?php
    $titlePage = 'Liste des centrex';

    if( isset($_SESSION['user_job']) && in_array($_SESSION['user_job'],['dirigeants', 'rr' ,'rs_itinerant','superadmin'])){

    
    require_once('./models/CentrexsModel.php');

    require_once('./vues/centrex/centrexs.php');
    
}else{
    header('Location:'.APP_URL.'/home');
    }