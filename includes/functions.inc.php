<?php


function emptyInputs($Fname, $Email, $Password, $Cpassword) {
    $result = "";

    if(empty($Fname) || empty($Email) || empty($Password) || empty($Cpassword)){

        $result = true;
    }else{
        $result = false;
    }

    return $result;
}


function invalidEmail($Email){
    $result = "";

    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function passworddMatch($Password, $Cpassword){
    $result = "";

    if($Password !== $Cpassword){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function userExist($conn, $Email){
    $sql = "SELECT * FROM regform WHERE email =?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../registration.php?eror=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result =false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser ( $conn, $Fname,  $Email, $Password){
    $sql = "INSERT INTO regform  (Fname, Email, Password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signup.php?eror=stmtfailed");
        exit();
    }

    $PassHashed = password_hash($Password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $Fname, $Email, $PassHashed);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php");
    exit();
}

function createCampaign ( $conn,$goal, $title, $Category, $Course, $location, $descr){
    $sql = "INSERT INTO donees  (goal, tittle, category, course, image, description) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signup.php?eror=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "isssss", $goal, $title, $Category, $Course, $location, $descr);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../allcampaign.php");
    exit();
}


function emptyLoginInputs($Email, $Password) {
    $result = "";

    if( empty($Email) || empty($Password)){
        
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function loginUser($conn, $Email, $Password){
    $unhashedpass = $Password;

    $uidExists = userExist($conn, $Email);
    $PassHashed = $uidExists["password"];
    $checkPass = password_verify($Password, $PassHashed);
    $row = $uidExists["UserType"];

    // var_dump($checkPass);
    // exit;

    if($checkPass === false){
        header("location: ../login.php?error=wronglogin");
        exit();

    }else if ($checkPass === true && $row === "Admin") {

        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["Fname"] = $uidExists["Fname"];
        $_SESSION["Email"] = $uidExists["email"];
        $_SESSION["Password"] = $uidExists["password"];
        // $_SESSION["Fname"] = $uidExists["Fname"];
        // $_SESSION["Lname"] = $uidExists["Lname"];
        // $_SESSION["Dbirth"] = $uidExists["Dbirth"];
        // $_SESSION["Gender"] = $uidExists["Gender"];
        // $_SESSION["Address"] = $uidExists["Address"];
        // $_SESSION["Contact"] = $uidExists["Contact"];
        // $_SESSION["Email"] = $uidExists["Emali"];
        // $_SESSION["Password"] = $uidExists["Password"];
        header("location: ../admin.php");
        exit();
    } else {
        session_start();
        $_SESSION["id"] = $uidExists["id"];
        $_SESSION["Fname"] = $uidExists["Fname"];
        $_SESSION["Email"] = $uidExists["email"];
        $_SESSION["Password"] = $uidExists["password"];
        header("location: ../otp.php");
        exit();
    }
}

//Delete user account
function deleteAccount($conn, $Email){
    $sql = "DELETE FROM regform WHERE email =?;";
    $stmt = mysqli_stmt_init($conn);
    
    print("Received = " + $_SESSION["Email"]);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../registration.php?eror=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    header("location: ../registration.php?eror=stmtfailed");
    
    session_start();
session_unset();
session_destroy();
header("location: ../Firstcampaign.php");
exit();


    mysqli_stmt_close($stmt);
}