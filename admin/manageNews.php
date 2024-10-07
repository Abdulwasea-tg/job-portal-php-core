<?php 
session_start();
include("..//gridview.php");

$News=$NewsDate="";
$error = array(
    "News"=>"",
    "NewsDate"=>"",);
require("ControllerAdminData.php");
//
//
//
if(isset($_SESSION["username"])){
    if (isset($_SESSION["message"])) {
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
    }
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT*FROM news_master;";

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

            <h3>News Management</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">

             <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
                <table>
                    <thead><td>Create News</td></thead>
                    <tr>
                        <td>News:</td>
                        <td><input type="text" name="News" id="News">
                        <span class="error">* <?php echo $error["News"];?></span></td>
                    </tr>
                    <tr>
                        <td>News Date:</td>
                        <td><input type="date" name="NewsDate" id="NewsDate"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="addNews" value="Create"></td>
                    </tr>
                </table>
             </form>

                

            <?php  $tableName = "News";
                    $colName = array("Id","News", "News Date","edit", "delete");
                    $actions=array("Edit", "Delete");
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>