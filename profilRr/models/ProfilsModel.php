<?php
require('./models/connect.php');


$query = $db->query("SELECT * FROM mdpi8535_profil");
$profils = $query->fetchAll();
require('./models/close.php');
