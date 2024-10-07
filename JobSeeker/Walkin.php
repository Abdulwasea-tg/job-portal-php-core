<?php 
session_start();
include("..//gridview.php");

if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT*FROM walkin_master;";

    $res = mysqli_query($conn, $query);
    if(!$res){
        //$result_set = mysqli_fetch_all($res,1);
        echo "ERROR: Coud not feach data";

        //print_r($_SESSION["user"] );
        //print_r($res);
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
            <h3>Walkin Interview Detail</h3>    
        </span>
        
        <!-- countent1 -->
        
            
        
        <div>
             <!-- countent2 -->
            <div class="container">

                <?php while($row=mysqli_fetch_assoc($res)){?>
                    <table>
                        <thead>
                            <td>Company Name</td>
                            <td><?php echo $row["CompanyName"];?></td>
                        </thead>
                        <tr>
                            <td>Job title:</td>
                            <td><?php echo $row["JobTitle"];?></td>
                            
                        </tr>
                        <tr>
                            <td>Vacncy:</td>
                            <td><?php echo $row["Vacancy"];?></td>
                        </tr>

                        <tr>
                            <td>Qualification:</td>
                            <td><?php echo $row["MinQualification"]?></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td><?php echo $row["Description"]?></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><?php echo $row["InterviewDate"]?></td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td><?php echo $row["InterviewTime"]?></td>
                        </tr>


                    </table>
                <?php }?>



            </div>

            

        </div>    
    </div><!-- End center -->
    
</body>
</html>