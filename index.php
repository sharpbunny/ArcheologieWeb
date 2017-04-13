<?php 
session_start();

// contains redirection to first controller



//TODO check if session exists
//TODO if not exists 
require('Controllers/LoginCtrl.php');
Login::DisplayLoginView();
//TODO else display research View




?>
