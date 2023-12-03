<?php
    try{
       //$dsn = "mysql:host=localhost;dbname=centrex";
        $dsn = "mysql:host=angano.fr;port=53360;dbname=centrex";
	$userDb = "es";
        $pwdDb = "es";
        $db = new PDO($dsn,$userDb,$pwdDb);
        $db->exec('SET NAMES utf8');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        echo $e->getMessage();
    }
