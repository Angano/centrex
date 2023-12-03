<?php

$_SESSION = array();
session_destroy();
header('Location:'.DOMAINE.'home/login');