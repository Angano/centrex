<?php
function flashMessage(){
    var_dump($_SESSION);
}

function setMessage($categorie,$message){
    $_SESSION['messages'][] = [$categorie,$message];
}

function cleanMessage(){
    $_SESSION['messages'] = [];
}

function getMessages(){
    if(isset($_SESSION['messages'])){
        return $_SESSION['messages'];
    }
   
}