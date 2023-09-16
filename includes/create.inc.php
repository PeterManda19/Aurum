<?php

require_once 'conn.inc.php';
require_once 'functions.inc.php';

if (isset($_POST['submit'])) {
    $goal = $_POST['cash'];
    $title = $_POST['title'];
    $Category = $_POST['select'];
    $Course = $_POST['loc'];
    $Upload = $_FILES['file'];
    $descr = $_POST['textarea'];

    $fileName = basename($Upload['name']);
    $location = "../Uploads/$fileName";
    $targetFolder = "../Uploads/";
    
    // Construct the full path of the image file
    $targetFilePath = $targetFolder . $fileName;

    // Move the uploaded file to the target folder
    if (move_uploaded_file($Upload['tmp_name'], $targetFilePath)) {
        // File was successfully saved, continue with your code here
        createCampaign($conn, $goal, $title, $Category, $Course, $location, $descr);
    } else {
        // Failed to save the file
        header("location: createcampainMail.php?error=uploadfailed");
        exit();
    }

    if (emptyInputs($goal, $title, $Category, $Course, $Upload, $descr) !== false) {
        header("location: createcampainMail.php?error=emptyinput");
        exit();
    }

} else {
    header("location: signup.php");
}
