<?php 
session_start();
include("..//gridview.php");
include("controll/ControllerJSData.php");
//$result_set2=array();
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    //$query = "SELECT*FROM job_master where JobId={$_POST["JobId"]};";
    $result_set = $_SESSION["job_data"];
    $query = "SELECT Status FROM application_master where JobSeekId='{$_SESSION["user"]["JobSeekId"]}' AND JobId ={$result_set["JobId"]};";

    //$res = mysqli_query($conn, $query);
    $res = mysqli_query($conn, $query);
    if($res){    
        $result_set2 = mysqli_fetch_all($res, 1);//fo check if the job applyed or not 

        //print_r($_SESSION["user"] );
        //print_r($res);
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
            <h3>Job Details</h3>    
            
        </span>
        
        <!-- countent1 -->
        
            
        
        <div>
            <a href="SearchJob.php"><-Back</a>
             <!-- countent2 -->
            <div class="container">
                <h4>Job Overview</h4> 
                    <table>
                        <thead>
                            <td>Company Name</td>
                            <td><?php echo $result_set["CompanyName"];?></td>
                        </thead>
                        <tr>
                            <td>Job title:</td>
                            <td><?php echo $result_set["JobTitle"];?></td>
                            
                        </tr>
                        <tr>
                            <td>Vacncy:</td>
                            <td><?php echo $result_set["Vacancy"];?></td>
                        </tr>

                        <tr>
                            <td>Qualification:</td>
                            <td><?php echo $result_set["MinQualification"]; ?></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><p><?php echo $result_set["Description"]; ?></p></td>
                        </tr>


                    </table>
                    <div>
                        <?php if(count($result_set2) <=0){?>
                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input type="hidden" name="recordId" value="<?php echo $result_set["JobId"]; ?>">
                            <button type="submit" name="ApplyJob">Apply</button>
                        </form>

                        <?php }else{ ?>
                            <span><?=$result_set2[0]["Status"];?></span>
                        <?php } ?>

                    </div>

            </div>

            

        </div>    
    </div><!-- End center -->
    
</body>
</html>