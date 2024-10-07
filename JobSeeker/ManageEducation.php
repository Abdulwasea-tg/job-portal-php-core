<?php 
session_start();
include("..//gridview.php");
$Degree=$University=$PassingYear=$Percentage="";
$error = array(
    "Degree" =>"",
    "University" =>"",
    "Percentage" =>"",
    "PassingYear" =>"",
);
//Controll user action
include("controll/ControllerJSData.php");

//Report
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT EduId, Degree, University,PassingYear, Percentage FROM jobseeker_education WHERE JobSeekId='{$_SESSION["user"]["JobSeekId"]}';";

    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_all($res,2);

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
    <style>
        .error{
            font-size: small;

        }
    </style>

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
            <h3>Education Management</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
        <?php include("layout/message.php");?>
             <!-- countent2 -->



            <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            
                <table>
                    <thead>
                        <td>Creat Eductional Profile</td>
                    </thead>
                    <tr>
                        <td>Degree :</td>
                        <td><input type="text" name="Degree" placeholder="Enter degree*">
                        <span class="error"><?php echo $error["Degree"]; ?></span></td>
                        <td>University/Board Name:</td>
                        <td><input type="text" name="University" placeholder="Enter Univercity name*">
                        <span class="error"><?php echo $error["University"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Passing Year:</td>
                        <td>
                            <select name="PassingYear">
                                <?php for($year =(int) date("Y"); 1900<=$year;$year--){?>
                                    <option value="<?=$year;?>"><?=$year;?></option>
                                    <?php } ?>
                            </select> 
                            <span class="error"><?php echo $error["PassingYear"]; ?></span>
                        </td>


                        <td>Percentage(%):</td>
                        <td><input type="number" name="Percentage" placeholder="Enter Percentage*">
                        <span class="error"><?php echo $error["Percentage"]; ?></span></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><input type="submit" name="addEducation" value="Add"></td>
                    </tr>
                </table>
            </form>
            <?php  $tableName = "Education";
                    $colName = array("ID", "Degree", "University", "Passin Year","Percentage(%)", "delete", "edit");
                    $actions=array("Delete", "Edit");
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>

            

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>