<?php 
session_start();
include("..//gridview.php");
$EduId=$Degree=$University=$PassingYear=$Percentage="";
$error = array(
    "Degree" =>"",
    "University" =>"",
    "Percentage" =>"",
    "PassingYear" =>"",
);
//Controll user action
include("controll/ControllerJSData.php");

//Recive data
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    if(isset($_SESSION["edu_data"])){
        $edu_data=$_SESSION["edu_data"];
        $EduId=$edu_data["EduId"];
        $Degree=$edu_data["Degree"];
        $University=$edu_data["University"];
        $PassingYear=$edu_data["PassingYear"];
        $Percentage=$edu_data["Percentage"];

        unset($_SESSION["edu_data"]);
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
            <h3>Edite Education</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="hidden" name="EduId" value="<?php echo $EduId;?>">
                <table>
                    <thead>
                        <td>Creat Eductional Profile</td>
                    </thead>
                    <tr>
                        <td>Degree :</td>
                        <td><input type="text" name="Degree" placeholder="Enter degree*" value="<?php echo $Degree;?>">
                        <span class="error"><?php echo $error["Degree"]; ?></span></td>
                        <td>University/Board Name:</td>
                        <td><input type="text" name="University" placeholder="Enter Univercity name*" value="<?php echo $University;?>">
                        <span class="error"><?php echo $error["University"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Passing Year:</td>
                        <td>
                            <select name="PassingYear" value="<?php echo $PassingYear;?>">
                                <?php for($year =(int) date("Y"); 1900<=$year;$year--){?>
                                    <option value="<?=$year;?>" <?php if($year==$PassingYear){echo "selected";}?>><?=$year;?></option>
                                    <?php } ?>
                            </select> 
                            <span class="error"><?php echo $error["PassingYear"]; ?></span>
                        </td>

                        <td>Percentage(%):</td>
                        <td><input type="number" name="Percentage" placeholder="Enter Percentage*" value="<?php echo $Percentage; ?>">
                        <span class="error"><?php echo $error["Percentage"]; ?></span></td>
                    </tr>
                    <tr>
                    <td></td>
                    
                    <td><a href="ManageEducation.php">Cancel</a>
                    <input type="submit" name="updateEdu" value="update"></td>
                    </tr>
                </table>
            </form>
            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>