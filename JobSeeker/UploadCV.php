<?php
session_start();
require("../config/connection.php");
$user=$_SESSION["user"]["JobSeekId"];
echo $user;
$target_dir = "../uploads/";

$target_file = $target_dir . $user . basename($_FILES["Resume"]["name"]);
echo $target_file. "<br>";
$uploadok = 1;

//get file type
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// check if file is already exist
if(file_exists($target_file)){
    echo "Sorry, File already exist. ";
    $uploadok = 0;
}

// check file size
// Limit the file size to 500kb
if($_FILES["Resume"]["size"] > 500000){
    echo "Sorry, your file is too large.";
    $uploadok = 0;
}

// Allow certain imgage formate
if($fileType != "pdf"){
    echo "Sorry, only PDF files are allowed. ";
    $uploadok = 0 ;
}

//Check if $uploadok set to 0 by an error
if($uploadok == 0){
    echo "Sorry, your file was not uploaded.";
} else{
    // if every thing is ok, try to upload the file
    if(move_uploaded_file($_FILES["Resume"]["tmp_name"], $target_file)){
        echo "The file ". htmlspecialchars($_FILES["Resume"]["name"] . " has been uploaded");
        $filename=basename($target_file);
        $query = "UPDATE jobseeker_Reg SET Resume='$filename' WHERE JobSeekId = '{$_SESSION["user"]["JobSeekId"]}'; ";
        $retval = mysqli_query($conn, $query);
        if(!$retval){
            echo '<script> alert("Could not update data.");</script>';
        }else{
            $_SESSION["message"]="Updated data successfully.";
            #echo '<script> alert("Updated data successfully.");</script>';
            header("Location: Profile.php");
            exit();
        }
    }
    else{
        echo "Sorry, there wase ane error uploading your file.";
    }
} 
?>