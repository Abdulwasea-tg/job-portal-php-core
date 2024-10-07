<?php 
session_start();
$user=$_SESSION["user"];
$txtName=$txtAddress=$txtCity=$txtEmail=$txtMobile=$txtQualification=$gender=$BirthDate=$Resume=$txtUname=$txtPassword=$txtCPassword="";
$error=array(
    "txtNameErr"=>"",
    "txtAddressErr"=>"",
    "txtCityErr"=>"",
    "txtEmailErr"=>"",
    "txtMobileErr"=>"",
    "txtQualificationErr"=>"",
    "genderErr"=>"",
    "BirthDateErr"=>"",
    "ResumeErr"=>"",
    "txtUnameErr"=>"",
    "txtPasswordErr"=>"",
    "txtCPasswordErr"=>""
);
$db_error="";# not used

$isValid = true;

require("controll\ControllerJSData.php");

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
            color: red;
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
            <h3>Profile</h3>    
        </span>

        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <?php 
                    if(!$isValid){
                        echo "<p><span class='error'>There is Error in input field !</span></p>";
                        foreach($error as $key=>$value){
                            if(!empty($error[$key])){
                                echo "<p><span class='error'>$key: $value</span></p>";
                            }
                            
                        }
                        echo "<p><span class='error'>$db_error</span></p>";
                    }
                    
                    
                     ?>
                <table>
                
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="txtName" id="txtName" value="<?php echo $user["JobSeekerName"]; ?>">
                            <span class="error">* <?php echo $error["txtNameErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type="text" name="txtAddress" id="txtAddress" required value="<?php echo $user["Address"]; ?>">
                            <span class="error">*<?php echo $error["txtAddressErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td><input type="text" name="txtCity" id="txtCity" required value="<?php echo $user["City"]; ?>">
                             <span class="error">*<?php echo $error["txtCityErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="txtEmail" id="txtEmail" required value="<?php echo $user["Email"]; ?>">
                            <span class="error">*<?php echo $error["txtEmailErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Mobile:</td>
                        <td><input type="text" name="txtMobile" id="txtMobile" required value="<?php echo $user["Mobile"]; ?>">
                            <span class="error">*<?php echo "{$error["txtMobileErr"]}"; ?></span></td>
                    </tr>
                    <td>Highst Qualification:</td>
                        <td><input type="text" name="txtQualification" id="txtQualification" required value="<?php echo $user["Qualification"]; ?>">
                            <span class="error">*<?php echo $error["txtQualificationErr"]; ?></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>  
                        <input type="radio" name="gender" id="gender"  value="male"  <?php if($user["Gender"]=="male"){echo "checked";} ?> style="width:auto">  Male
                        <input type="radio" name="gender" id="gender" value="female" <?php if($user["Gender"]=="female"){echo "checked";} ?> style="width:auto">  Female
                        <span class="error">* <?php echo $error["genderErr"]; ?></td>
                    </tr>
                    <tr>
                        <td>Birth Date:</td>
                        <td><input type="date" name="BirthDate" id="BirthDate" required value="<?php echo $user["BirthDate"]; ?>">
                            <span class="error">*<?php echo $error["BirthDateErr"]; ?></td>
                    </tr>
                    <!-- 
                    <tr>
                        <td>Resume:</td>
                        <td><input type="file" name="Resume" id="Resume" required  value="<?php echo $user["Resume"]; ?>">
                            <span class="error">*<?php echo $error["ResumeErr"]; ?></td>
                    </tr>-->
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" name="txtUname" id="txtUname" required value="<?php echo $user["UserName"]; ?>">
                            <span class="error">*<?php echo $error["txtUnameErr"]; ?></span></td>
                    </tr>
<!--                     <tr>
                        <td>Password</td>
                        <td><input type="password" name="txtPassword" id="txtPassword" required value="<<?php /*  echo $user["Password"];  */?>">
                            <span class="error">*<?php /* echo $error["txtPasswordErr"];  */?></span></td>
                    </tr>
                    <tr>
                        <td>Confirme Password</td>
                        <td><input type="password" name="txtCPassword" id="txtCPassword" required value="<?php /* echo $user["Password"];  */?>">
                            <span class="error">*<?php /* echo $error["txtCPasswordErr"]; */ ?></span></td>
                    </tr>
                    <tr> -->
<!--                         <td>Security Question</td>
                        <td><input type="text" name="txtUname" id="txtSecQ" value=""></td>
                    </tr>
                    <tr>
                        <td>Answer</td>
                        <td><input type="text" name="txtUname" id="txtAnswer" value=""></td>
                    </tr> -->
                   
                    <tr>
                        <td></td>
                        <td><input type="submit" name="UpdateProfile" id="UpdateProfile" value="Update"></td>
                    </tr>
                </table>
                </form>

                <form method="post" action="UploadCV.php" enctype="multipart/form-data">
                    <table>
                    <tr>
                        <td>Resume:</td>
                        <td><input type="file" name="Resume" id="Resume" required  value="<?php echo $user["Resume"]; ?>">
                            <span class="error">*<?php echo $error["ResumeErr"]; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="UpdateCV" id="UpdateCV" value="Upload Resume"></td>
                    </tr>
                    </table>
                </form>
                <a href="Profile.php">Back</a>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>