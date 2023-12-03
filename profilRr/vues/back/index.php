<?php

$_SESSION = array();
session_destroy();
header('Location:'.APP_URL.'home');