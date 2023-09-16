<?php
require_once 'conn.inc.php';
session_start();

$sql = "DELETE FROM regform WHERE email =?;";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../registration.php?eror=stmtfailed");
    exit();
}


mysqli_stmt_bind_param($stmt, "s", $_SESSION["Email"]);
mysqli_stmt_execute($stmt);


$resultData = mysqli_stmt_get_result($stmt);


print($_SESSION["Email"]);


session_start();
session_unset();
session_destroy();
header("location: ../Firstcampaign.php");
exit();

mysqli_stmt_close($stmt);

header("location: ../registration.php?eror=stmtfailed");
// if (!empty($_SESSION["Email"])) {
    // print($_SESSION["Email"]);
    // deleteAccount($conn, $_SESSION["Email"]);
// }
// $_SESSION["id"] = $uidExists["id"];
// $_SESSION["Fname"] = $uidExists["Fname"];
// $_SESSION["Email"] = $uidExists["email"];
// $_SESSION["Password"] = $uidExists["password"];
 

exit();

