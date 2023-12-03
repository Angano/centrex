<?php
require('./models/connect.php');

$sql = "INSERT INTO mdpi8535_profil (`intitule`,`repertoire`,`code`) VALUES (:intitule,:repertoire,:code)";
$query = $db->prepare($sql);
$query->bindValue(':intitule',$profil['intitule'],PDO::PARAM_STR);
$query->bindValue(':repertoire',$profil['repertoire'], PDO::PARAM_STR);
$query->bindValue(':code',$profil['code'],PDO::PARAM_STR);
$query->execute();

require('./models/close.php');