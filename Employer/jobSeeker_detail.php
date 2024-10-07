<?php 
session_start();
include("..//gridview.php");
$CallLetterDes="";
$CallLetterDesErr="";
//$result_set = array();
if(isset($_SESSION["username"])){
    if(isset($_SESSION["Application_id"])){
        $AppId = $_SESSION["Application_id"];
        $result_set = $_SESSION["personal_info"];
        $education_info = $_SESSION["education_info"];
        $Status = $_SESSION["Status"];

        //echo $_SESSION["jobseeker_id"];
        //print_r($result_set);
    }else{
        header("Location: Applications.php");
        exit();
    }
}else{
    header("Location: ../app/login.php");
    exit();
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


//Controll user action
include("controll/ControllerEmData.php");


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="..//gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="..//css.css">
    
   <!--  <style>
        td{
            text-align: start;
        }
    </style> -->

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
            <h3>Job Seeker Detail</h3>
            <a href="Applications.php">Back</a>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                    <table>
                        <caption>Personal Information</caption>
                        <tr>
                            <td>Name:</td>
                            <td><?php echo $result_set["JobSeekerName"] ;?></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><?php echo $result_set["Address"] ;?></td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td><?php echo $result_set["City"] ;?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $result_set["Email"] ;?></td>
                        </tr>
                        <tr>
                            <td>Mobile:</td>
                            <td><?php echo $result_set["Mobile"] ;?></td>
                        </tr>
                        <td>Highst Qualification:</td>
                            <td><?php echo $result_set["Qualification"] ;?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td><?php echo $result_set["Gender"] ;?></td>
                        </tr>
                        <tr>
                            <td>Birth Date:</td>
                            <td><?php echo $result_set["BirthDate"] ;?></td>
                        </tr>
                        <tr>
                            <td>Resume:</td>
                            <td><a href="<?php echo "../uploads/".$result_set["Resume"] ;?>" target="_blank">View</a></td>
                        </tr>
                    </table>
                    
                <?php
                    $tableName = "Education";
                    $colName = array("Degree", "University", "Passin Year","Percentage(%)");
                    $actions=array();
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($education_info);
                    $grid->addAndCloseEnd()?>

            <?php if($Status =="apply"){?>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <table>
                    <tr>
                        <td>Call Letter Description</td>
                        <td><textarea name="CallLetterDes" id="" cols="60" rows="5"></textarea>
                        <span class="error"><?php echo $CallLetterDesErr; ?></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="sendCallLetter" value = "Send"></td>
                    </tr>
                </table>
            </form>
            <?php } ?>
            </div>
        </div>    
    </div><!-- End center -->
    
</body>
</html>