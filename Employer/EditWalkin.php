<?php 
session_start();
include("..//gridview.php");
$error=array(
    "jobTitleErr"=>"",
    "jobVacancyErr"=>"",
    "jobQualificationErr"=>"",
    "jobSalaryErr"=>"",
    "jobDescriptionErr"=>""
);
$WalkinId=$jobTitle=$jobVacancy=$jobQualification=$jobSalary=$jobDescription=$date=$time="";
include("controll/ControllerEmData.php");

if(isset($_SESSION["username"])){

    if(isset($_SESSION["EditWalkin"])){
        $result_set = $_SESSION["EditWalkin"];

        $WalkinId=$result_set["WalkInId"];
        $jobTitle=$result_set["JobTitle"];
        $jobVacancy=$result_set["Vacancy"];
        $jobQualification=$result_set["MinQualification"];
        $jobDescription=$result_set["Description"];
        $date=$result_set["InterviewDate"];
        $time=$result_set["InterviewTime"];
        unset($_SESSION["EditJob"]);
        //print_r($_SESSION["user"] );
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
            <h3>Edit Walkin</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->



            <div class="container">
            <div class="error_box">
                    <?php foreach($error as $e){
                        if(!empty($error[$e])){
                            echo "<span class='error'>{$error[$e]}</span>";
                        }

                    }
                    ?>
                </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="WalkinId" value="<?php echo $WalkinId;?>">
            
                <table>
                    <tr>
                        <td>Job Title :</td>
                        <td><input type="text" name="jobTitle" placeholder="Enter Job Title*" value="<?php echo $jobTitle;?>">
                        <span class="error"><?php echo $error["jobTitleErr"]; ?></span></td>
                        <td>Total Vacancy:</td>
                        <td><input type="number" name="jobVacancy" placeholder="Enter Vacancy*" value="<?php echo $jobVacancy;?>">
                        <span class="error"><?php echo $error["jobVacancyErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Qualification:</td>
                        <td><input type="text" name="jobQualification" placeholder="Enter Qualification*" value="<?php echo $jobQualification;?>">
                        <span class="error"><?php echo $error["jobQualificationErr"]; ?></span></td>


                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name="jobDescription" id="" cols="30" rows="5"><?php echo $jobDescription;?></textarea></td>
                        
                    </tr>
                    <tr>
                        <td>Interview Date :</td>
                        <td><input type="date" name="date" value="<?php echo $date;?>"></td>
                        <td>Interview Time:</td>
                        <td><input type="time" name="time" value="<?php echo $time;?>"></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><a href="ManageWalkin.php">Cancel</a>
                        <input type="submit" name="updateWalkin" value="Update"></td>
                    </tr>
                </table>
            </form>
       
            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>