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
$jobTitle=$jobVacancy=$jobQualification=$jobSalary=$jobDescription=$date=$time="";
include("controll/ControllerEmData.php");

if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT WalkInId, JobTitle, Vacancy, MinQualification,Description, InterviewDate, InterviewTime Description FROM walkin_master WHERE CompanyName='{$_SESSION["user"]["CompanyName"]}';";

    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_all($res,2);

        //$result_set["InterviewTime"]=date("h:i:sa",strtotime($result_set["InterviewTime"]));

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
        .center{
            width: 85%;
            height: 100%;
            margin: 0px;
        }
        .nav{
            height: 100%;
        }
        .header{
            height: 40px;
        }

      
    </style>

</head>
<body>
    <!-- header -->
    <?php include("header.php"); ?>
    <!-- side -->
    <?php include("side.php"); ?>

    <!-- center -->
    <div class="center">
        <!-- titel -->
        <span class="titel">
            <i class="icon">add icon</i>
            <h2>Walkin Managment</h2>    
        </span>
        
        <!-- countent1 -->
        <div>
        <?php include("layout/message.php");?>
             <!-- countent2 -->



            <div class="container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <?php foreach($error as $e){
                if(!empty($error[$e])){
                    echo "<span class='error'>{$error[$e]}</span>";
                }

            }
            ?>
                <table class="tb1">
                    <tr>
                        <td>Job Title :</td>
                        <td><input type="text" name="jobTitle" placeholder="Enter Job Title*">
                        <span class="error"><?php echo $error["jobTitleErr"]; ?></span></td>
                        <td>Total Vacancy:</td>
                        <td><input type="number" name="jobVacancy" placeholder="Enter Vacancy*">
                        <span class="error"><?php echo $error["jobVacancyErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Qualification:</td>
                        <td><input type="text" name="jobQualification" placeholder="Enter Qualification*">
                        <span class="error"><?php echo $error["jobQualificationErr"]; ?></span></td>
                        <td>Salary:</td>
                        <td><input type="number" name="jobSalary" placeholder="Enter Salary">
                        <span class="error"><?php echo $error["jobSalaryErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name="jobDescription" id="" cols="30" rows="5">Write job description...</textarea></td>
                        
                        <tr>
                        <td>Interview Date :</td>
                     
                        <td><input type="date" name="date"></td>
                        <td>Interview Time:</td>
                        <td><input type="time" name="time"></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td><input type="submit" name="addWalkin" value="Add"></td>
                    </tr>
                </table>
            </form>
            <!-- <form action="<?php /*  htmlspecialchars($_SERVER['PHP_SELF']);  */?>" method="post"> -->
            <?php  $tableName = "Walkin";
                    $colName = array("ID", "Job Title", "Vacancy","Qualivication", "Description","Date", "Time","Delete", "Edit");
                    $actions=array("Delete", "Edit");
                        //$data_set = array(array("1", "3", "air","single", "No", "Delete"));
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>
            <!--< /form> -->

            

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>