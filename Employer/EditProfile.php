<?php 
session_start();
$user = $_SESSION["user"];
$txtComId=$txtComName=$txtContactPerson=$txtAddress=$txtCity=$txtEmail=$txtMobile=$txtAOW=$txtUname="";
$error=array(
    "txtComIdErr"=>"",
    "txtComNameErr"=>"",
    "txtContactPersonErr"=>"",
    "txtAddressErr"=>"",
    "txtCityErr"=>"",
    "txtEmailErr"=>"",
    "txtMobileErr"=>"",
    "txtAOWErr"=>"",
    "txtUnameErr"=>""
);
include("controll/ControllerEmData.php");

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="..//gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="..//css.css">
    
    <style>
       .error{color: red;}
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
            <h3>Profile</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                <form method="post" action="<?PHP htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <table>
                    <tr>
                        <td>Company ID:</td>
                        <td><input type="text"  name="txtComId" id="txtComId" readonly value="<?php echo $user["EmployerId"]?>">
                    </td>
                    </tr>
                    <tr>
                        <td>Company Name:</td>
                        <td><input type="text" name="txtComName" id="txtComName" value="<?php echo $user["CompanyName"]?>" required>
                        <span class="error">* <?php echo $error["txtComNameErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Contact Person:</td>
                        <td><input type="text" name="txtContactPerson" id="txtContactPerson" value="<?php echo $user["ContactPerson"]?>">
                        <span class="error">* <?php echo $error["txtContactPersonErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Address:</td> 
                        <td><input type="text" name="txtAddress" id="txtAddress" value="<?php echo $user["Address"]?>">
                        <span class="error">*<?php echo $error["txtAddressErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td><input type="text" name="txtCity" id="txtCity" value="<?php echo $user["City"]?>">
                        <span class="error">*<?php echo $error["txtCityErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="txtEmail" id="txtEmail" value="<?php echo $user["Email"]?>">
                        <span class="error">*<?php echo $error["txtEmailErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Mobile:</td>
                        <td><input type="text" name="txtMobile" id="txtMobile" value="<?php echo $user["Mobile"]?>">
                        <span class="error">*<?php echo $error["txtMobileErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Area of Work:</td>
                        <td><input type="text" name="txtAOW" id="txtAOW" value="<?php echo $user["Area_Work"]?>">
                        <span class="error">*<?php echo $error["txtAOWErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" name="txtUname" id="txtUname" value="<?php echo $user["UserName"]?>">
                        <span class="error">*<?php echo $error["txtUnameErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="updateProfile" id="Update" value="Update"></td>
                    </tr>
                </table>
                
                </form>
                <a href="Profile.php">Back</a>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>