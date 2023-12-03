<?php
    // Si postValue est seté et non vide, on retourne la valeur, sinon on retourne false
    // String
    function checkPostRequired($post,$input){
        
        if(isset($post[$input]) && !empty($post[$input])){
            return trim($post[$input]);
        }else{
            return false;
        }
    }

    // Si postValue est seté, on retourne la valeur, sinon on retourne false
    // String
    function checkPost($post,$input){
        
        if(isset($post[$input])){
            return trim($post[$input]);
        }else{
            return false;
        }
    }

    // Si postValue est seté , on retourne la valeur, sinon on retourne false
    // Null
    function checkPostNull($post,$input){
        
        if(isset($post[$input])){
            return trim($post[$input]);
        }else{
            return null;
        }
    }

    // Si postValue est seté , on retourne la valeur, sinon on retourne false
    // Boolean
    function checkPostBoolean($post,$input){
        if(isset($post[$input]) && !empty($post[$input])){

            if($post[$input]==='1'){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    //  Contrôle si l'utilisateur connecté a le rôle 
    //  $roles = array
    function checkRole($roles){
        if(isset($_SESSION['user_job']) && in_array($_SESSION['user_job'],$roles)){
            return true;
        }else{
            return false;
        }
    }

    // Vérification si le login n'est pas déjà utilisé
    function IsUsedLogin($rowidUpdateUser,$loginUpdateUser){
        require('./models/IsUsedLoginModel.php');
        if( $isUsedLogin === false){
            return false;
        }else{
            setMessage('warning','Login déjà utilisé');
            return true;
        }
        
    }

    // Gestion affichage lien actif
    function active($controller,$url){
       echo $controller;
        if( strtolower(str_replace('Controller','',$controller))=== $url){
            echo " active-url ";
        } ;
    }

    // gestion redirection après login
    // function convertJobToDirectory($job){

    //     // | job                     | Traduction
    //     // +-------------------------+----------------------------------+
    //     // | Responsable des achats  |  profilResponsableAchat          |
    //     // | Ambu-Commande           |  profilAmbulancierCommande       |
    //     // | Assistante de Direction |  profilAssistantDirection        |
    //     // | Directrice Générale     |  profilDirectionGenerale         |
    //     // | Cadre dirigeante        |  profileCadreDirigeant           |
    //     // | D.G. ATLANTIS           |  profilDirectionGeneralAtlantis  |
    //     // | Responsable funéraire   |  profilResponsableFuneraire      |
    //     // | Cadre dirigeant         |  profilCadreDirigeant            |
    //     // | Assistante-AF           |  profifAssistantAF               |
    //     // | Responsable-AF          |  profilResponsableAF             |
    //     // | superadmin              |  profilSuperAdmin                |
    //     // | dirigeant               |  profilDirection                 |
    //     // | rs_itinerant            |  profilRsItinerant               |
    //     // | rr                      |  profilRr                        |
    //     // +-------------------------+----------------------------------+

    //     $profils = [
    //                     'profilResponsableAchats'=>[
    //                         'Responsable des achats'
    //                         ],
    //                     'profilAmbulancierCommande'=>[
    //                         'Ambu-Commande'
    //                         ],
    //                     'profilAssistantDirection'=>[
    //                         'Assistante de Direction'
    //                         ],
    //                     'profilDirectionGenerale'=>[
    //                         'Directrice Générale'
    //                         ],
    //                     'profilCadreDirigeant'=>[
    //                         'cadre dirigeante', 
    //                         'cadre dirigeant'
    //                         ],
    //                     'profilDirectionGeneralAtlantis'=>[
    //                         'D.G. ATLANTIS'
    //                         ],
    //                     'profilResponsableFuneraire'=>[
    //                         'Responsable funéraire'
    //                         ],
    //                     'profilAssistantAF'=>[
    //                         'assistante-AF'
    //                         ],
    //                     'profilResponsableAF'=>[
    //                         'Responsable-AF'
    //                         ],
    //                     'profilSuperAdmin'=>[
    //                         'superadmin'
    //                         ],
    //                     'profilDirection'=>[
    //                         'direction'
    //                         ],
    //                     'profilRsItinerant'=>[
    //                         'rs_itinerant'
    //                         ],
    //                     'profilRr'=>[
    //                         'rr'
    //                         ]
    //                 ];

    //     $data = array();
    //     foreach($profils as $directory=>$profilsAuthorized){
    //         if(in_array(strtolower($job),array_map('strtolower',$profilsAuthorized))){
    //             $data[]=$directory;
    //         }
    //     }
    //     if(count($data)!==1){
    //         return 'profilInvite';
    //     }else{
    //         return $data[0];
    //     }
    // }

    // Permet de valider les informations pour mise à jour d'un utilisateur
    function dataIsValidForUpdateUser($post,$argument){
        $dataOk = true;

        // Vérification des valeurs postées sont présentes + suppression des  espaces blanc
        $user_update= [
            'rowid' => checkPostRequired($post,'rowid'),
            'login' => checkPostRequired($post,'login'),
            'email' => checkPost($post,'email'),
            'civility' => checkPost($post,'civilite'),
            'firstname' => checkPost($post,'firstname'),
            'lastname' => checkPost($post,'lastname'),
            'address' => checkPost($post,'address'),
            'zip' => checkPost($post,'zip'),
            'town' => checkPost($post,'town'),
            'job' => checkPostNull($post,'job'),
        ];
    
        // nettoyage de l'email
        $user_update['email'] = filter_var($user_update['email'], FILTER_SANITIZE_EMAIL);

        // Vérifiaction de tous les champs sont ok
        

        $user_update['statut'] = checkPostBoolean($post,'status');

        if(!preg_match('/^[a-zA-Z._-]{1,}$/',$user_update['login'])){
            $dataOk = false;
            setMessage('warning','login non conforme');
        }

        if(!preg_match('/^[a-zA-Z]{1,}$/', $user_update['civility'])){
            $dataOk = false;
            setMessage('warning','Civilité non conforme');
        }
        
        if(!preg_match('#^[\w]+$#u', $user_update['firstname'])){
            $dataOk = false;
            setMessage('warning','firstname non conforme');
        }

        if(!preg_match('#^[\w]+$#u', $user_update['lastname'])){
            $dataOk = false;
            setMessage('warning','Lastname non conforme');
        }

        #$user_update['address'] = filter_var($user_update['address'],FILTER_SANITIZE_ADD_SLASHES);

        if(!preg_match('#^[\w\' ]+$#u', $user_update['address'])){
            $dataOk = false;
            setMessage('warning','Adresse non conforme');
        }

        if(!preg_match('/^[0-9]{5}$/', $user_update['zip'])){
            $dataOk = false;
            setMessage('warning','Zip non conforme');
        }
        if(!preg_match('#^[\w _-]+$#u', $user_update['town'])){
            $dataOk = false;
            setMessage('warning','Ville non conforme');
        }

        if(!preg_match('/^[1-9]{1}[0-9]*$/', $user_update['rowid'])){
            $dataOk = false;
            setMessage('warning','Id non conforme');
        }

        if(!preg_match('#(1|)#', $user_update['statut'])){
            $dataOk = false;
            setMessage('warning','Statut non conforme');
        }

        // si aucune erreur, on retourne $user_update, sinon on renvoie false
        if($dataOk){
            return $user_update;
        }else{
            return false;
        }
        
    }

    // Permet de valider les informations pour création d'un profil
    // on vérifie notamment que l'on reçoit bien les informations au format que l'on attend
    function dataIsValidCreateProfil(){

        $profil = array();

        //  intitulé
        // Vérification si valeur existe et non et correspond à un format

        $profil['intitule'] = checkPostRequired($_POST,'intitule');

        if( !$profil['intitule'] or !preg_match('/^[a-zA-Z_ -éàèêùçï]{1,}$/', $profil['intitule'])){
          
            setMessage('danger','Intitulé non conforme');
            $profil['intitule'] = false;
        }


        // repertoire
        // Vérification si valeur existe et non et correspond à un format
        $profil['repertoire'] = checkPostRequired($_POST,'repertoire');

        if( !$profil['repertoire'] or !preg_match('/^[a-zA-Z_]{1,}$/', $profil['repertoire'])){
            setMessage('danger','Repertoire non conforme');
            $profil['repertoire'] = false;
        }


        //  code
        // Vérification si valeur existe et non et correspond à un format

        $profil['code'] = checkPostRequired($_POST,'code');

        if( !$profil['code'] or !preg_match('/^[a-zA-Z-_]{1,}$/', $profil['code'])){
            setMessage('danger','Code non conforme');
            $profil['code'] = false;
        }

        
        if(!in_array('false',$profil)){
            return $profil;
        }else{
            return false;
        }

        
       
    }
    
    // retourne le répertoire de travail de l'utilisateur connecté
        function getWorkDirectoryUser(){
            
            if(isset($_SESSION['user_id'])){
                $argument = intval($_SESSION['user_id']);
            require('models/UserByIdModel.php');
            return $user;
            }
            else{
                return false;
            }
            
        }