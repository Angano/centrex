<?php
    
    session_unset();
    session_destroy();
  
    setMessage('success','Vous êtes déconnecté');
    header('Location:'.DOMAINE.'home/login');