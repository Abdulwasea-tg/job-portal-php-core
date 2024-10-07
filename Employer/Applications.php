<?php 
session_start();
include("..//gridview.php");
$data_set ="";
$all_jobs=array();
include("controll/ControllerEmData.php");

if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    // Get all jobs that employer have post to feach job title and qualivication for selectbox
    $query = "SELECT *FROM job_master WHERE CompanyName='{$_SESSION["user"]["CompanyName"]}';";
/*     $query2 = "SELECT a.JobSeekerName, a.City, a.Email, b.Status FROM jobseeker_reg a, application_master b WHERE a.JobSeekId=b.JobSeekId AND b.JobId REGEXP  ;"; */

    $res = mysqli_query($conn, $query);
    if($res){
        $all_jobs = mysqli_fetch_all($res,1);
        //$data_set=$all_jobs;
        //print_r($all_jobs);
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
            <h3>Applications</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                    <table>
                        <tr>
                        <td>Status:</td>
                            <td>
                                <select name="Status" id="">
                                    <option value="all"></option>
                                    <option value="apply" <?php if(isset($_POST["Status"])){
                                                              if($_POST["Status"]=="apply"){echo "selected";}}?>
                                            >apply</option>
                                    <option value="Call Latter Send"
                                        <?php if(isset($_POST["Status"])){
                                                if($_POST["Status"]=="Call Latter Send"){echo "selected";}}?>
                                    >Call Latter Send</option>

                                </select>
                            </td>


                            <td>Select Job Title:</td>
                            <td>
                                <select name="selectedJobTitle" id=""  >
                                    <option value="all">All Application</option>
                                    <?php foreach ($all_jobs as $row) {?>
                                            <option 
                                                value="<?=$row["JobId"];?>" 
                                                <?php if(isset($_POST["selectedJobTitle"])){
                                                        if($_POST["selectedJobTitle"]==$row["JobId"]){echo "selected";}}?>
                                            >  <?=$row["JobTitle"];?>  
                                            </option>

                                    <?php } ?>
                            
                                </select>
                            </td>

                            <td><input type="submit" name="searchApplication" value="ViewApplication"></td>
                        </tr>

                    </table>

                </form>

                <div>
  
                    <?php  
                        $tableName = "Application";
                        $colName = array("Id", "Name", "City","Emaile", "statuse", "View&send");
                        $actions=array("View");
                       //$data_set = array(array("1", "Abdu", "Taiz","abd@gmail.com", "No"));
                       $grid = new Gridview($tableName, $colName, $actions) ;
                       $grid->creat_table($data_set);?>
                    

                </div>
            </div>

            

        </div>    
    </div><!-- End center -->
    
</body>
</html>