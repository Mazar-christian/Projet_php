<?php 
if(isset($_POST['eamil'])){ 
    $email = $_POST['email'];
    echo'email:'.$email;
}
if(isset($_POST['password'])){ 
$password = $_POST['password'];
}

if(isset($_POST['cocher'])){ 
    $cocher = $_POST['cocher'];
    echo 'coher:'.$cocher;
}
if(isset($_POST['valider'])){ 
    $valider = $_POST['valider'];
}