<?php
    $argument = $_SESSION['user_id'];
    require('./models/UserByIdModel.php');
    echo json_encode($user);