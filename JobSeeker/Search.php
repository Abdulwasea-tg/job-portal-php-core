<?php 
session_start();
include("..//gridview.php");
$available_jobs = array();
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    if(isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
        $query="SELECT*FROM job_master where JobTitle LIKE '%$keyword%';";
        $res = mysqli_query($conn, $query);
    
        if($res){
            $available_jobs = mysqli_fetch_all($res,2);
            //print_r($_SESSION["user"] );
        }
        else{
            echo "ERROR: Coud not feach data";
        }
    
    }


}else{
    header("Location: ../app/login.php");
}

//
// For searchbox
//

$query = "SELECT a.CompanyName,a.MinQualification, b.Area_Work FROM job_master a, employer_reg b WHERE a.CompanyName=b.CompanyName;";
$res = mysqli_query($conn, $query);
$data_set = mysqli_fetch_all($res, 1);
$searchFilter = array(
    "qualification" => array(),
    "company" => array(),
    "area_work" => array(),
);
$searchFilter["qualification"] = array_unique(array_column($data_set,"MinQualification"));
$searchFilter["company"] = array_unique(array_column($data_set,"CompanyName"));
$searchFilter["area_work"] = array_unique(array_column($data_set,"Area_Work"));
//print_r($searchFilter["company"])


include("controll/ControllerJSData.php");
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="..//gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="..//css.css">
    <style>
        .tb2 tr td:first-child{
            visibility:hidden;
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
            <h3>Search Job</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
            <!-- Search box -->
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                <div class="filter_box">
                    <table>
                        <tr>
                            <td>Search:</td>
                            <td>
                                <input type="search" name="keyword" id="" placeholder="Enter keyword or Job Title...">
                            </td>  
                            <td><input type="submit" name="Search" value="search"></td>
                        </tr>

                    </table>
                </div>

            </form>

            <!-- Filter box -->
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="filter_box" style="float: left;">
                    <table>
                        <thead>
                            <td>Select Qualification: </td>
                            <td>Select Company Name:</td>
                        </thead>

                        <tr>
                            <td>
                                <select name="selectedJobQualification" id="">
                                    
                                <?php foreach ($searchFilter["qualification"] as $key => $value) {?>
                                        <option value="<?=$value;?>" <?php if(isset($_POST["selectedJobQualification"])){if($_POST["selectedJobQualification"]==$value){echo "selected";}}?>><?=$value;?></option>
                                    <?php } ?>
                                </select>   
                            </td>   
                       
                            
                            <td>
                                <select name="selectedCompanyName" aria-multiline="true" id="">
                                <?php foreach ($searchFilter["company"] as $key => $value) {?>
                                        <option value="<?=$value;?>" <?php if(isset($_POST["selectedCompanyName"])){if($_POST["selectedCompanyName"]==$value){echo "selected";}}?>><?=$value;?></option>
                                    <?php } ?>
                                </select>
                            </td>
                       
                        

                        <!-- <tr>
                            <td>Select Area of Work:</td>
                            <td><select name="selectedAOW" id="">
                            <?php 
                                /* foreach ($searchFilter["area_work"] as $key => $value) {
                                    echo "<option value='$value'>$value</option>";
                                } */
                                ?>
                            </select></td>
                        </tr> -->
                       
                            <td><input type="submit" name="Search" value="Search"></td>
                        </tr>

                    </table>
                </div>

                </form>
                <!-- Grid of all available Jobs -->
                <div>

                <?php  $tableName = "Job";
                    $colName = array("Job Id","Company Name", "Job Title","Vacancy", "Min Qualification","Description", "Apply");
                     $actions=array("Detail");
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($available_jobs);
                    $grid->addAndCloseEnd()?>

              

            </div>



            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>