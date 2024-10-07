<?php 
session_start();
include("..//gridview.php");

$News=$NewsDate="";
$error = array(
    "News"=>"",
    "NewsDate"=>"",);
//
//
//
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT*FROM news_master WHERE NewsId='{$_SESSION["NewsId"]}';";

    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_assoc($res);
        $News=$result_set["News"];
        $NewsDate=$result_set["NewsDate"];
        //print_r($_SESSION["user"] );
    }
    else{
        echo "ERROR: Coud not feach data";
    }

}else{
    header("Location: ../app/login.php");
}
//
// Control admin actions
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
            <h3>News Management</h3>    
            <a href="manageNews.php">Back</a>
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
             <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <table>
                    <thead><td>Create News</td></thead>
                    <tr>
                        <td>News:</td>
                        <td><input type="text" name="News" id="News" value="<?php echo $News;?>">
                        <span class="error">* <?php echo $error["News"];?></span></td>
                    </tr>
                    <tr>
                        <td>News Date:</td>
                        <td><input type="date" name="NewsDate" id="NewsDate" value="<?php echo $NewsDate;?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="manageNews.php">Cancel</a>
                            <input type="submit" name="updateNews" value="Update"></td>
                    </tr>
                </table>
             </form>

        </div>    
    </div><!-- End center -->
    
</body>
</html>