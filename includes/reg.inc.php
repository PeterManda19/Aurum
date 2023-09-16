<?php

if(isset($_POST['submit'])){

    $Fname = $_POST['fullname'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Cpassword = $_POST['repeat_password'];
    

    require_once 'conn.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputs($Fname, $Email, $Password, $Cpassword) !== false){
        header("location: signup.php?error=emptyinput");
        exit();
    }
    

    if(invalidEmail($Email) !== false){
        header("location: signup.php?error=invalidemail");
        exit();
    }

    if(passworddMatch($Password, $Cpassword) !== false){
        header("location: signup.php?error=passdontmatch");
        exit();
    }

    if(userExist($conn, $Email) !== false){
        header("location: signup.php?error=alreadyExist");
        exit();
    }

    createUser($conn, $Fname, $Email, $Password);

}else{
    header("location: signup.php");

}