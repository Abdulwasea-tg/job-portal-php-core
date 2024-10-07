<?php 
session_start();
include("..//gridview.php");

$UserName=$Password=$ConfPassword="";
$error = array(
    "UserName"=>"",
    "Password"=>"",
    "ConfPassword"=>"",);
    
//
//
//
if(isset($_SESSION["username"])){

    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT*FROM user_master WHERE UserId={$_SESSION["UserId"]};";

    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_assoc($res);
        $UserName = $result_set["UserName"];
        $Password = $result_set["Password"];
        $ConfPassword = $Password;

        //print_r($_SESSION["user"] );
    }
    else{
        echo "ERROR: Coud not feach data";
    }

}else{
    header("Location: ../app/login.php");
}

//
// Control Admin actions
//
require("ControllerAdminData.php");

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="../css.css">

</head>
<body>
    <!-- header -->
    <?php include("header.php") ?>
    <!-- side -->
    <?php include("side.php") ?>

    <!-- center -->
    <div class="center">
        <!-- titel -->
        <span class="titel">
            <h3>User Management</h3>
            <a href="manageUsers.php">Back</a>   
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <table>
                    <thead><td>Create New User</td></thead>
                    <tr>
                        <td>UserName:</td>
                        <td><input type="text" name="UserName" id="UserName" value="<?php echo $UserName;?>">
                        <span class="error">* <?php echo $error["UserName"];?></td>
                    </tr>
                    <tr>
                        <td>Passowrd:</td>
                        <td><input type="password" name="Password" id="Password" value="<?php echo $Password;?>">
                        <span class="error">* <?php echo $error["Password"];?></td>
                    </tr>
                    <tr>
                        <td>Confirme Passowrd:</td>
                        <td><input type="password" name="ConfPassword" id="ConfPassword" value="<?php echo $ConfPassword;?>">
                        <span class="error">* <?php echo $error["ConfPassword"];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="manageUsers.php">Cancel</a>
                            <input type="submit" name="updateUser" value="Update"></td>
                    </tr>
                </table>
                </form>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>