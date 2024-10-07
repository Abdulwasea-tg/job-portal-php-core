<?php 
session_start();
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    //print_r($_SESSION);
    $query = "SELECT EmployerId,CompanyName, ContactPerson, Address, City, Email, Mobile, Area_Work,UserName FROM employer_reg WHERE UserName='{$_SESSION['username']}' AND Password='{$_SESSION['password']}';";
    $res = mysqli_query($conn, $query);
    if($res){
        $result_set = mysqli_fetch_array($res, 1);
        $_SESSION["EId"]= $result_set["EmployerId"];
        $_SESSION["user"] = $result_set ;
        //print_r($_SESSION["user"] );
    }
    else{
        echo "ERROR: Coud not feach data";
    }

}else{
    header("Location: ../app/login.php");
}

/* $username=$_SESSION["username"];
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
                    <ul class="menu">
                        <li class="l"><button id="tab_1" class="btn" href=""><img src="Resorce//add room.png" alt="noimg"></img><a href="index.php">Home</a></button></li>
                        <li class="l"><button id="tab_2" class="btn" href=""><img src="Resorce//add room.png" alt="noimg"></img><a href="Profile.php">Profile</a></button></li>
                        <li class="l"><button id="tab_3" class="btn" href=""><img src="Resorce//add room.png" alt="noimg"></img><a href="ManageJob.php">Jop Managment</a></button></li>
                        <li class="l"><button id="tab_4" class="btn" href=""><img src="Resorce//add room.png" alt="noimg"></img><a href="ManageWalkin.php">Walkin Managment</a></button></li>
                        <li class="l"><button id="tab_5" class="btn" href=""><img src="Resorce//add room.png" alt="noimg"></img><a href="Applications.php">Application</a></button></li>

                    </ul>
            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>