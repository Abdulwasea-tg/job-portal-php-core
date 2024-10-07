<?php 
session_start();
include("..//gridview.php");

$UserName=$Password=$ConfPassword="";
$error = array(
    "UserName"=>"",
    "Password"=>"",
    "ConfPassword"=>"",);

// Control Admin actions
require("ControllerAdminData.php");
//
//
//
if(isset($_SESSION["username"])){
    //
    // Show if there is any message
    if (isset($_SESSION["message"])) {
        echo $_SESSION["message"];

        unset($_SESSION["message"]);
    }
    //
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT*FROM user_master;";

    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_all($res, 2);
        //print_r($_SESSION["user"] );
    }
    else{
        echo "ERROR: Coud not feach data";
    }

}else{
    header("Location: ../app/login.php");
}
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
             
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
            <div class="error_box">
                    <?php 
                        if(!$isValid){
                            echo "<p><span class='error'>There is Error in input field !</span></p>";
                            foreach($error as $key=>$value){
                                if(!empty($error[$key])){
                                    echo "<p><span class='error'>$key: $value</span></p>";
                                } 
                            }
                            echo "<p><span class='error'>$db_error</span></p>";
                        }
                        ?>
                    </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <table>
                    <thead><td>Create New User</td></thead>
                    <tr>
                        <td>UserName:</td>
                        <td><input type="text" name="UserName" id="UserName" placeholder="Enter user name">
                        <span class="error">* <?php echo $error["UserName"];?></td>
                    </tr>
                    <tr>
                        <td>Passowrd:</td>
                        <td><input type="password" name="Password" id="Password" placeholder="Enter Password">
                        <span class="error">* <?php echo $error["Password"];?></td>
                    </tr>
                    <tr>
                        <td>Confirme Passowrd:</td>
                        <td><input type="password" name="ConfPassword" id="ConfPassword" placeholder="Confirm Password">
                        <span class="error">* <?php echo $error["ConfPassword"];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="addUser" value="Add"></td>
                    </tr>
                </table>
                </form>

                

                <?php  $tableName = "User";
                    $colName = array("Id","UserName","Password", "edit", "delete");
                    $actions=array("Edit", "Delete");
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>