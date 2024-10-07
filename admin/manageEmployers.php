<?php 
session_start();
include("..//gridview.php");
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT EmployerId,CompanyName, City,ContactPerson FROM employer_reg WHERE Status !='Confirm';";

    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_all($res, 2);
        //print_r($_SESSION["user"] );
    }
    else{
        echo "ERROR: Coud not feach data";
    }

}else{
    header("Location: ../app/login.php");
}
//
// ON Detail is clicked
//
if (isset($_POST["DetailEmployer"]) && isset($_POST["recordId"])) {
    $_SESSION["recordId"] = $_POST["recordId"];
    header("Location: employerDetail.php");
    
} 
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="../css.css">

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
            <h2>Employers Management</h2>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
            <?php  $tableName = "Employer";
                    $colName = array("ID","Company Name", "City","Contact Person", "detail");
                    $actions=array("Detail");
                    $grid = new Gridview($tableName, $colName, $actions) ;
                    $grid->creat_table($result_set);
                    $grid->addAndCloseEnd()?>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>