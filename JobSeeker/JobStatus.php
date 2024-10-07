<?php 
session_start();
include("..//gridview.php");
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT a.CompanyName, a.JobTitle, b.Status, b.Description FROM job_master a, application_master b WHERE a.JobId=b.JobId AND b.JobSeekId = {$_SESSION["user"]["JobSeekId"]} ;";

    $res = mysqli_query($conn, $query);

    if($res){
        $applied_jobs = mysqli_fetch_all($res,2);

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
            <h3>Job Status</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                        <!-- Grid of Status of applied Jobs -->
                    <div>   
                        <h4>Status of Job</h4>
                        <?php  
                                $tableName = "Applications";
                                $colName = array("Company Name", "Job Title","Status","Description");                   
                                $actions=array();
                                $grid = new Gridview($tableName, $colName, $actions) ;
                                $grid->creat_table($applied_jobs);
                                $grid->addAndCloseEnd()
                        ?>
                </div>



            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>