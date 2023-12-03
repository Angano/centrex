<?php

// Récupération des société avec un centrex

require('./models/connect.php');

$sql = "SELECT * FROM centrex_data
INNER JOIN llx_societe ON(centrex_data.fk_llx_soc=llx_societe.rowid)";

$query = $db->query($sql);
$query->execute();

$societes = $query->fetchALL();

require('./models/close.php');
