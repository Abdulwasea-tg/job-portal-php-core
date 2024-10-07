<?php 
require("../config/connection.php");
$isValid = true;
$db_error = "";
#################################################################
#               User Managment Panle actions                    #
#################################################################

//
// Add user Action
//

if(isset($_POST["addUser"])){
    //echo "addnews btn clicked";
    //
    // Validate user input data
    //
    if(empty($_POST["UserName"])){
        $error["UserName"] = "Pleas fill the field";
        $isValid = false;
    }else {
        $UserName = test_input($_POST["UserName"]);
        if (!preg_match("/^[a-zA-Z0-9' ]*$/", $UserName)) {
            $error["UserName"] = "Only Letters, Numbers and Whaitspace are allowed";
            $isValid = false;
        }
    }
    if(empty($_POST["Password"])){
        $error["Password"] = "Pleas fill the field";
        $isValid = false;
    }else {
        $Password = test_input($_POST["Password"]);
        if (!preg_match("/^[a-zA-Z0-9' ]*$/", $Password)) {
            $error["Password"] = "Only Letters, Numbers and Whaitspace are allowed";
            $isValid = false;
        }
    }
    if(empty($_POST["ConfPassword"])){
        $error["ConfPassword"] = "Pleas fill the field";
        $isValid = false;
    }else {
        $ConfPassword = test_input($_POST["ConfPassword"]);
        if (!preg_match("/^[a-zA-Z0-9' ]*$/", $ConfPassword)) {
            $error["ConfPassword"] = "Only Letters, Numbers and Whaitspace are allowed";
            $isValid = false;
        }
    }
    //
    // Insert data to database if it is valid
    if($isValid){
        // Check if confirmation password equal new Password
        if ($ConfPassword == $Password) {
            // Authintcate user
            $query = "SELECT*FROM user_master WHERE UserName='$UserName';";
            $retval = mysqli_query($conn, $query);
            //Check if it is a uniqe username or not
            if (mysqli_num_rows($retval) == 0) {
                // Then Insert data to the database
                $query = "INSERT INTO user_master(UserName, Password)";
                $query.="VALUES('$UserName', '$Password');";
                $retval = mysqli_query($conn, $query);
                if(!$retval){
                    $db_error = "DB_ERROR: Sorry coudn't insert data.";
                    //$isError=true;
                    echo '<script> alert("DB_ERROR: Sorry coudn not insert data.");</script>';
                }
                else{
                    echo '<script> alert("Added data successfuly.");</script>';
        
                }
            } else {
                // If not then
                echo '<script> alert("There is already such username, Please enter another one.");</script>';

            }
        }else {
            // If Confimation password dos not equal password ,show error
            $error["ConfPassword"] = "Confirmation Password must equal new password";
        }

    }
    

}

//
// Edit (user) Action
//

if(isset($_POST["EditUser"])){
    if(isset($_POST["recordId"])){
        $_SESSION["UserId"] = $_POST["recordId"];
        header("Location:updateUser.php");
    }
}

//
// Update (user) Action
//

if(isset($_POST["updateUser"])){
    //echo "addnews btn clicked";

    // Validate user input data
    if(empty($_POST["UserName"])){
        $error["UserName"] = "Pleas fill the field";
        $isValid = false;
    }else {
        $UserName = test_input($_POST["UserName"]);
        if (!preg_match("/^[a-zA-Z0-9' ]*$/", $UserName)) {
            $error["UserName"] = "Only Letters, Numbers and Whaitspace are allowed";
            $isValid = false;
        }
    }
    if(empty($_POST["Password"])){
        $error["Password"] = "Pleas fill the field";
        $isValid = false;
    }else {
        $Password = test_input($_POST["Password"]);
        if (!preg_match("/^[a-zA-Z0-9' ]*$/", $Password)) {
            $error["Password"] = "Only Letters, Numbers and Whaitspace are allowed";
            $isValid = false;
        }
    }
    if(empty($_POST["ConfPassword"])){
        $error["ConfPassword"] = "Pleas fill the field";
        $isValid = false;
    }else {
        $ConfPassword = test_input($_POST["ConfPassword"]);
        if (!preg_match("/^[a-zA-Z0-9' ]*$/", $ConfPassword)) {
            $error["ConfPassword"] = "Only Letters, Numbers and Whaitspace are allowed";
            $isValid = false;
        }
    }
    //
    // Update database if user input is valid data
    if($isValid){
        // Check if confirmation password equal new Password
        if ($ConfPassword == $Password) {
            //Then
            // Authintcate user
            $query = "SELECT*FROM user_master WHERE UserName='$UserName' AND UserId != {$_SESSION["UserId"]};";
            $retval = mysqli_query($conn, $query);

            //Check if it is a uniqe username or not
            if (mysqli_num_rows($retval) == 0) {
                // Then update data 
                $query = "UPDATE user_master SET UserName='$UserName',Password='$Password' WHERE UserId={$_SESSION["UserId"]};";
                $retval = mysqli_query($conn, $query);
                if(!$retval){
                    echo '<script> alert("Sorry Could not Update data.");</script>';
                }
                else{
                    echo '<script> alert("Updated data successfuly.");</script>';
                    $_SESSION["message"] = '<script> alert("Updated data successfuly.");</script>';
                    header("Location:manageUsers.php");
                    exit();
                }
            } else {
                // If not a uniqe username show errort
                $error["UserName"] = "There is already such username, Please enter another one.";
    
            }

        } else {
            // If Confimation password dos not equal password ,show error
            $error["ConfPassword"] = "Confirmation Password must equal new password";
        }


    }
    

}

//
// Delete (news) Action
//

if(isset($_POST["DeleteUser"])){
    if(isset($_POST["recordId"])){
        $query = "DELETE FROM user_master WHERE UserId={$_POST["recordId"]};";
        $retval = mysqli_query($conn, $query);
        if(!$retval){
            echo '<script> alert("Could not delete user.");</script>';
        }
        else{
            echo '<script> alert("Deleted user successfuly.");</script>';
        }
    }
}

#################################################################
#               News Managment Panle's actions                  #
#################################################################

//
// Add (news) action
//

if(isset($_POST["addNews"])){
    //echo "addnews btn clicked";
    //
    // Validate user input data
    //
    if(empty($_POST["News"])){
        $error["News"] = "Pleas fill news field";
        $isValid = false;
    }else {
        $News = test_input($_POST["News"]);
        if (!preg_match("/^[a-zA-Z0-9' ]*$/", $News)) {
            $error["News"] = "Only Letters, Numbers and Whaitspace are allowed";
            $isValid = false;
        }
    }
    if(empty($_POST["NewsDate"])){
        $NewsDate = time();
    }else {
        $NewsDate = test_input($_POST["NewsDate"]);

    }
    //
    // Insert data to database if it is valid
    //
    if($isValid){
        $query = "INSERT INTO news_master(News, NewsDate)";
        $query.="VALUES('$News', '$NewsDate');";

        //Insert data to the database
        $retval = mysqli_query($conn, $query);
        if(!$retval){
            $db_error = "DB_ERROR: Sorry coudn't insert data.";
            //$isError=true;
            echo '<script> alert("DB_ERROR: Sorry coudn not insert data.");</script>';
        }
        else{
            echo '<script> alert("Added data successfuly.");</script>';

        }
    }
    

}

//
// Update (news) Action
//

if(isset($_POST["updateNews"])){
    //echo "addnews btn clicked";
    //
    // Validate user input data
    if(empty($_POST["News"])){
        $error["News"] = "Pleas fill news field";
        $isValid = false;
    }else {
        $News = test_input($_POST["News"]);
        if (!preg_match("/^[a-zA-Z0-9' ]*$/", $News)) {
            $error["News"] = "Only Letters, Numbers and Whaitspace are allowed";
            $isValid = false;
        }
    }
    if(empty($_POST["NewsDate"])){
        $NewsDate = time();
    }else {
        $NewsDate = test_input($_POST["NewsDate"]);

    }
    //
    // Update data if it is valid
    if($isValid){
        $query = "UPDATE news_master SET News='$News',NewsDate='$NewsDate' WHERE NewsId={$_SESSION["NewsId"]};";
        $retval = mysqli_query($conn, $query);
        if(!$retval){
            echo '<script> alert("Could not Update record.");</script>';
        }
        else{
            echo '<script> alert("Updated data successfuly.");</script>';
            $_SESSION["message"] = '<script> alert("Updated data successfuly.");</script>';
            header("Location:manageNews.php");
            exit();
        }
    }
    

}

//
// EditNews
//

if(isset($_POST["EditNews"])){
    if(isset($_POST["recordId"])){
        $_SESSION["NewsId"] = $_POST["recordId"];
        header("Location:updateNews.php");
    }
}

//
// Delete (news) Action
//

if(isset($_POST["DeleteNews"])){
    if(isset($_POST["recordId"])){
        $query = "DELETE FROM news_master WHERE NewsId={$_POST["recordId"]};";
        $retval = mysqli_query($conn, $query);
        if(!$retval){
            echo '<script> alert("Could not delete record.");</script>';
        }
        else{
            echo '<script> alert("Deleted data successfuly.");</script>';
        }
    }
}



function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>