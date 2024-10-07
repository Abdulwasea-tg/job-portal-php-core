<?php 
session_start();
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    //$query = "SELECT JobSeekId, JobSeekerName, Address, City, Email, Mobile, Qualification, Gender, BirthDate, Resume, UserName FROM jobseeker_reg WHERE UserName='{$_SESSION['username']}' AND Password='{$_SESSION['password']}'; ";
    $query = "SELECT*FROM user_master WHERE UserName='{$_SESSION['username']}' AND Password='{$_SESSION['password']}';";
    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_array($res, 1);
        $_SESSION["user"] = $result_set ;
        //print_r($_SESSION["user"] );
    }
    else{
        echo "ERROR: Coud not feach data";
    }

}else{
    header("Location: ../app/login.php");
}
?>

<?php 
/* session_start();
$username=$_SESSION["username"];
$password=$_SESSION["password"];
//echo "<script> alert('usenn= $username ,pass=  $password.');</script>";
if(empty($username) || empty($password)){
    if(!empty($_SESSION)){
        session_destroy();
    }
    //die("<script> alert('usenn= $username ,pass=  $password.');</script>");
    header("Location: ../app/index.php");
} */

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
    <style>
        .menu{
            list-style: none;
            margin:0px auto;
            width: 100%;

        }
        .l{
            display: inline-block;
            background-color: #0070C0;
            width: 18%;
            display:inline-block;
        }
        .l{
            height: 100px;

        }
        .btn{
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 5px;
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
            <h3>Home</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">

                <ul>
                    <li class="l"><a href="index.php"><button id="tab_1" class="btn_tab" href="">Home</button></a></li class="l">
                    <li class="l"><a href="manageEmployers.php"><button id="tab_2" class="btn_tab" href=""><img src="Resorce//add room.png" alt="noimg"></img>Employer Managment</button></a></li>
                    <li class="l"><a href="manageJobSeekers.php"><button id="tab_3" class="btn_tab" href=""><img src="Resorce//add room.png" alt="noimg"></img>Job Seeker Management</button></a></li>
                    <li class="l"><a href="manageNews.php"><button id="tab_4" class="btn_tab" href=""><img src="Resorce//add room.png" alt="noimg"></img>News Management</button></a></li>
                    <li class="l"><a href="manageUsers.php"><button id="tab_6" class="btn_tab" href=""><img src="Resorce//add room.png" alt="noimg"></img>Users Management</button></a></li>
                    <li class="l"><a href="feedback.php"><button id="tab_5" class="btn_tab" href=""><img src="Resorce//add room.png" alt="noimg"></img>Feedback</button></a></li>
                    <li class="l"><a href="logout.php"><button id="tab_6" class="btn_tab" href=""><img src="Resorce//add room.png" alt="noimg"></img>Logout</button></a></li>
                </ul>


                    
            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>