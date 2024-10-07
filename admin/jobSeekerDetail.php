<?php 
session_start();
if(isset($_SESSION["username"])){
    include("../config/connection.php");
    if ($_SESSION["recordId"]) {
                //print_r($_SESSION);
        $query = "SELECT*FROM jobseeker_reg WHERE JobSeekId={$_SESSION["recordId"]};";
        $res = mysqli_query($conn, $query);
        if($res){
            $result_set = mysqli_fetch_array($res, 1);
            //print_r($_SESSION["user"] );
        }else{
            echo "ERROR: Coud not feach data";
        }    
    }//
}else{
    header("Location: ../app/login.php");
}

// Control btn Aprov action
if(isset($_POST["Approv"])){
    //Update the statuse of applications
    $query = "UPDATE jobseeker_reg SET Status='Confirm' WHERE JobSeekId={$_SESSION["recordId"]} ";
    $retval = mysqli_query($conn, $query);
    if (!$retval) {
        echo '<script> alert("ERROR: Coud not Confirm User"); </script>';
    }else {
        echo '<script>alert("User Confirmed Successfuly.");</script>';
        header("Location:manageJobSeekers.php");
    }
}//End if


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
            <h3>Profile</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                <table>
                    <tr>

                    <tr>
                        <td>Name:</td>
                        <td><?php echo $result_set["JobSeekerName"] ?></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><?php echo $result_set["Address"] ?></td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td><?php echo $result_set["City"] ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $result_set["Email"] ?></td>
                    </tr>
                    <tr>
                        <td>Mobile:</td>
                        <td><?php echo $result_set["Mobile"] ?></td>
                    </tr>
                    <td>Highst Qualification:</td>
                        <td><?php echo $result_set["Qualification"] ?></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td><?php echo $result_set["Gender"] ?></td>
                    </tr>
                    <tr>
                        <td>Birth Date:</td>
                        <td><?php echo $result_set["BirthDate"] ?></td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><?php echo $result_set["UserName"] ?></td>
                    </tr>
                    <tr>
                        <td>Resume:</td>
                        <td><a href="<?php echo $result_set["Resume"] ?>">View</a></td>
                    </tr>


                    <tr>
                        <td></td>
                        <td><a href="manageJobSeekers.php">Cancel</a>
                            <input type="submit" name="Approv" value="Approv"></td>
                        
                    </tr>
                </table>
            </form>



            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>