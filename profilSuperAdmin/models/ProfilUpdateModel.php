<?php 
require('./models/connect.php');


$sql = "UPDATE mdpi8535_profil 
        SET 
            `code`=:code,
            `intitule`=:intitule,
            `repertoire`=:repertoire
        WHERE `id`=:id;";

$query = $db->prepare($sql);

$query->bindValue(':id',$profil['id'], PDO::PARAM_STR);
$query->bindValue(':repertoire',$profil['repertoire'],PDO::PARAM_STR);
$query->bindValue(':intitule',$profil['intitule'], PDO::PARAM_STR);
$query->bindValue(':code',$profil['code'],PDO::PARAM_STR);

if(!$query->execute()){
    die('chiote!');
};

require('./models/close.php');