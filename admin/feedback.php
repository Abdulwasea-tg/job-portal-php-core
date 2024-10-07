<?php 
session_start();
include("..//gridview.php");
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT b.FeedbackId,a.JobSeekerName,b.FeedBack, b.FeedbakDate FROM jobseeker_reg a, feedback b WHERE b.JobSeekId=a.JobSeekId;";

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
            <?php  $tableName = "Feedback";
                    $colName = array("Id","Job Seeker Name", "Feedback", "Date");
                    $actions=array();
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>


            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>