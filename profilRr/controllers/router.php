<?php
// répertoire absolue  de l'application
$APP_DIR = dirname($_SERVER['SCRIPT_FILENAME']);   

$titlePage = 'Document';

$dat = array();
$dat['request_scheme'] = $_SERVER['REQUEST_SCHEME'];
$dat['http_host'] = $_SERVER['HTTP_HOST'];
$dat['request_uri'] = $_SERVER['REQUEST_URI'];




// Détermination de l'url de base
$taburl = explode('/',$dat['request_uri']);
$index = array_search('centrex', $taburl)+1;
require_once('./helpers/functions.php');
require_once('./helpers/flashMessages.php');

$url_base = '';

for($i=0; $i<=$index;$i++){
    $url_base = $url_base.$taburl[$i].'/';

}
// Supprime tous les caractères sauf les lettres, chiffres et $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=. 
$url_base =filter_var($url_base,FILTER_SANITIZE_URL);

// url de l'application
define('APP_URL', $url_base);
define('DOMAINE',$dat['request_scheme'].'://'.$_SERVER['HTTP_HOST'].'/centrex/');

// vérification si l'utilisateur courant est dans le bon répertoire
$currentUserWorkDirectory = getWorkDirectoryUser();


if(!empty($currentUserWorkDirectory) && $currentUserWorkDirectory['repertoire']!==$taburl[$i-1] && $currentUserWorkDirectory['repertoire']!== false){
   session_unset();
   header('Location:'.DOMAINE.'home/back');
   die('true');

}elseif($currentUserWorkDirectory === false){
    
    header('Location:'.DOMAINE.'home/login');
    die('false');
};

$origine = explode('/',str_replace(APP_URL,'',$_SERVER['REQUEST_URI']));

// Initialisation des variables $arguments et $more
$argument = null;
$more = null;


// Détermination du controller
$controller = ucfirst($origine[0]).'Controller';

// Détermination des arguments
if(isset($origine[1])){

    // Vérification si on a bien à faire à un entier
    if(preg_match('/^\d+$/',$origine[1])){
        $argument = $origine[1] ;
    }
    // Sinon nous a avons à faire à une option en chaine de caractère
    elseif(preg_match('/^[a-zA-Z]+$/', $origine[1])){
        $more = $origine[1];
    };
}

try{
    
    if(!file_exists('./controllers/'.$controller.'.php')){
        echo $controller;
        throw new Error('<br>Le fuchier n\'est pas définie');
        die;
    
        
       
    }else{
        require_once('./controllers/'.$controller.'.php');
        die;
    }
    
   
}
catch(Error $e){
  
    echo "Message : " . $e->getMessage();
    setMessage('danger','Url inconnue');
    header('Location:'.APP_URL.'home');
};




?>
