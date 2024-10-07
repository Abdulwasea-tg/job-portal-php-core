<?php 
session_start();
include("..//gridview.php");
$Feedback="";

if(isset($_SESSION["username"])){
    include("../config/connection.php");
    if(isset($_POST["sendFeedback"])){
        $Feedback = test_input($_POST["Feedback"]);
        $date = date("Y-m-d");

                //print_r($_SESSION);
        $query = "INSERT INTO feedback(JobSeekId, Feedback, FeedbakDate)";
        $query .= "VALUES({$_SESSION["user"]["JobSeekId"]}, '$Feedback', '$date')";
        
        try {
            $res = mysqli_query($conn, $query);
            if(!$res){
                //$result_set = mysqli_fetch_all($res,1);
                echo "ERROR: Coud not feach data";
    
                //print_r($_SESSION["user"] );
                //print_r($res);
            }else{
                echo '<script> alert("Sended Feedback successfuly.");</script>';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            //echo "<script> alert(".$e->getMessage().");</script>";
            
        }

    }


}else{
    header("Location: ../app/login.php");
}
//test user input
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}





?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="..//gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="..//css.css">


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
            <i class="icon">add icon</i>
            <h3>Feedback</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <table>
                        <thead><td>Give Your Feedback</td></thead>
                        <tr>
                            <td>Feedback:</td>
                            <td><textarea name="Feedback" id="Feedback" cols="60" rows="10">Write here...</textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="sendFeedback" value="Submit"></td>
                        </tr>

                    </table>
                </form>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>