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
        <?php include("layout/message.php");?>
             <!-- countent2 -->
            <div class="container">
                <table>
                    <tr>

                        <td>Company ID:</td>
                        <td><?php echo $result_set["EmployerId"] ?></td>
                    </tr>
                    <tr>
                        <td>Company Name:</td>
                        <td><?php echo $result_set["CompanyName"] ?></td>
                    </tr>
                    <tr>
                        <td>Contact Person:</td>
                        <td><?php echo $result_set["ContactPerson"] ?></td>
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
                    <tr>
                        <td>Area of Work:</td>
                        <td><?php echo $result_set["Area_Work"] ?></td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><?php echo $result_set["UserName"] ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="EditProfile.php">Edit Profile</a></td>
                    </tr>
                </table>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>