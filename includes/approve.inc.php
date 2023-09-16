<?php 
include_once 'conn.inc.php';

if(isset($_POST['update'])){
    $campaignId = $_POST['update']; 

    // Rest of your code for updating the campaign status
    $query = "UPDATE `donees` SET status = 'approved' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $campaignId);
    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_affected_rows($stmt) > 0){
        header("Location: ../admin.php");
        exit();
    } else {
        echo "Failed to update campaign status: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
