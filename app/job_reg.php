<?php 
require("../control/ControllerUserData.php");



$txtComName=$txtAddress=$txtCity=$txtEmail=$txtMobile=$txtQualification=$gender=$birthOD=$Resume=$txtUname=$txtPassword=$txtCPassword="";
$error=array(
    "txtComNameErr"=>"",
    "txtAddressErr"=>"",
    "txtCityErr"=>"",
    "txtEmailErr"=>"",
    "txtMobileErr"=>"",
    "txtQualificationErr"=>"",
    "genderErr"=>"",
    "birthODErr"=>"",
    "ResumeErr"=>"",
    "txtUnameErr"=>"",
    "txtPasswordErr"=>"",
    "txtCPasswordErr"=>""
);
$isValid = true;
// validate data
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["txtComName"]))
    {
        $error["txtComNameErr"] = "Name is required.";
        $isValid = false;
    }
    else{
        $txtComName = test_input($_POST["txtComName"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtComName)){
            $error["txtComNameErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else


    if(empty($_POST["txtAddress"]))
    {
        $error["txtAddressErr"] = "Address is required.";
        $isValid = false;
    }
    else{
        $txtAddress = test_input($_POST["txtAddress"]);
    }// End else

    if(empty($_POST["txtCity"]))
    {
        $error["txtCityErr"] = "City is required.";
        $isValid = false;
    }
    else{
        $txtCity = test_input($_POST["txtCity"]);
        // check if city name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtCity)){
            $error["txtCityErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtEmail"]))
    {
        $error["txtEmailErr"] = "E-mail is required.";
        $isValid = false;
    }
    else{
        $txtEmail = test_input($_POST["txtEmail"]);
        // // check if e-mail address is well-formed
        if(!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)){
            $error["txtEmailErr"] = "Invalid e-mail address!";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtMobile"]))
    {
        $error["txtMobileErr"] = "Mobile is required.";
        $isValid = false;
    }
    else{
        $txtMobile = test_input($_POST["txtMobile"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[0-9- ]*$/", $txtMobile)){
            $error["txtMobileErr"] = "Only numbers and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtQualification"]))
    {
        $error["txtQualificationErr"] = "Area of work is required.";
        $isValid = false;
    }
    else{
        $txtQualification= test_input($_POST["txtQualification"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtQualification)){
            $error["txtQualificationErr"] = "Only letters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    
    if(empty($_POST["txtUname"]))
    {
        $error["txtUnameErr"] = "Username is required.";
        $isValid = false;
    }
    else{
        $txtUname = test_input($_POST["txtUname"]);
        // check if username only contain numbers and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtUname)){
            $error["txtUnameErr"] = "Only letters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["txtPassword"]))
    {
        $error["txtPasswordErr"] = "Password is required.";
        $isValid = false;
    }
    else{
        $txtPassword = test_input($_POST["txtPassword"]);
    }// End else

    if(empty($_POST["txtCPassword"]))
    {
        $error["txtCPasswordErr"] = "Confirme Password is required.";
        $isValid = false;
    }
    else{
        $txtCPassword = test_input($_POST["txtCPassword"]);
    }// End else


}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

 

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="..//gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="..//style2.css">

    
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
                    if($isValid){
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
                        <td><input type="text" name="txtComName" id="txtName" >
                            <span class="error">* <?php echo $error["txtComNameErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type="text" name="txtAddress" id="txtAddress" required value='<?php echo "$txtCity"; ?>'>
                            <span class="error">*<?php echo $error["txtAddressErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td><input type="text" name="txtCity" id="txtCity" required value="<?php echo $txtCity ;?>">
                             <span class="error">*<?php echo $error["txtCityErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="txtEmail" id="txtEmail" required value="<?php echo $txtEmail; ?>">
                            <span class="error">*<?php echo $error["txtEmailErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Mobile:</td>
                        <td><input type="text" name="txtMobile" id="txtMobile" required value="<?php echo $txtMobile ;?>">
                            <span class="error">*<?php echo $error["txtMobileErr"]; ?></span></td>
                    </tr>
                    <td>Highst Qualification:</td>
                        <td><input type="text" name="txtQualification" id="txtQualification" required value="<?php echo $txtQualification; ?>">
                            <span class="error">*<?php echo $error["txtQualificationErr"]; ?></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>  
                        <input type="radio" name="gender" id="gender" value="Male">  Male
                        <input type="radio" name="gender" id="gender" value="Female">  Female
                        </td>
                    </tr>
                    <tr>
                        <td>Birth Date:</td>
                        <td><input type="date" name="birthOD" id="birthOD" required value="<?php echo $birthOD; ?>">
                            <span class="error">*<?php echo $error["birthODErr"]; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Resume:</td>
                        <td><input type="file" name="Resume" id="Resume"required value="<?php echo $Resume; ?>">
                            <span class="error">*<?php echo $error["ResumeErr"]; ?>Upload File</td>
                    </tr>
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" name="txtUname" id="txtUname" required value="<?php echo $txtUname; ?>">
                            <span class="error">*<?php echo $error["txtUnameErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="txtPassword" id="txtPassword" required value="<?php echo $txtPassword; ?>">
                            <span class="error">*<?php echo $error["txtPasswordErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Confirme Password</td>
                        <td><input type="password" name="txtCPassword" id="txtCPassword" required value="<?php echo $txtCPassword; ?>">
                            <span class="error">*<?php echo $error["txtCPasswordErr"]; ?></span></td>
                    </tr>
                    <tr>
<!--                         <td>Security Question</td>
                        <td><input type="text" name="txtUname" id="txtSecQ" value=""></td>
                    </tr>
                    <tr>
                        <td>Answer</td>
                        <td><input type="text" name="txtUname" id="txtAnswer" value=""></td>
                    </tr> -->
                   
                    <tr>
                        <td></td>
                        <td><input type="submit" name="jobSeekerRegister" id="jobSeekerRegister" value="Creat Acount"></td>
                    </tr>
                </table>
                </form>
                <a href="Profile.php">Back</a>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>