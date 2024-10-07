<?php 
$txtComId=$txtComName=$txtContactPerson=$txtAddress=$txtCity=$txtEmail=$txtMobile=$txtAOW=$txtUname=$txtPassword=$txtCPassword="";
$error=array(
    "txtComNameErr"=>"",
    "txtContactPersonErr"=>"",
    "txtAddressErr"=>"",
    "txtCityErr"=>"",
    "txtEmailErr"=>"",
    "txtMobileErr"=>"",
    "txtAOWErr"=>"",
    "txtUnameErr"=>"",
    "txtPasswordErr"=>"",
    "txtCPasswordErr"=>""
);

$isError = false;
require("../control/ControllerUserData.php");
// validate data
/*
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["txtComName"]))
    {
        $error["txtComNameErr"] = "Company name is required.";
        $isError = true;
    }
    else{
        $txtComName = test_input($_POST["txtComName"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtComName)){
            $error["txtComNameErr"] = "Only latters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtContactPerson"]))
    {
        $error["txtContactPersonErr"] = "Contact person is required.";
        $isError = true;
    }
    else{
        $txtContactPerson = test_input($_POST["txtContactPerson"]);
        // check if Contact person name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtContactPerson)){
            $error["txtContactPersonErr"] = "Only latters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtAddress"]))
    {
        $error["txtAddressErr"] = "Address is required.";
        $isError = true;
    }
    else{
        $txtAddress = test_input($_POST["txtAddress"]);
    }// End else

    if(empty($_POST["txtCity"]))
    {
        $error["txtCityErr"] = "City is required.";
        $isError = true;
    }
    else{
        $txtCity = test_input($_POST["txtCity"]);
        // check if city name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtCity)){
            $error["txtCityErr"] = "Only latters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtEmail"]))
    {
        $error["txtEmailErr"] = "E-mail is required.";
        $isError = true;
    }
    else{
        $txtEmail = test_input($_POST["txtEmail"]);
        // // check if e-mail address is well-formed
        if(!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)){
            $error["txtEmailErr"] = "Invalid e-mail address!";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtMobile"]))
    {
        $error["txtMobileErr"] = "Mobile is required.";
        $isError = true;
    }
    else{
        $txtMobile = test_input($_POST["txtMobile"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[0-9- ]*$/", $txtMobile)){
            $error["txtMobileErr"] = "Only numbers and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtAOW"]))
    {
        $error["txtAOWErr"] = "Area of work is required.";
        $isError = true;
    }
    else{
        $txtAOW = test_input($_POST["txtAOW"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtAOW)){
            $error["txtAOWErr"] = "Only letters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    
    if(empty($_POST["txtUname"]))
    {
        $error["txtUnameErr"] = "Username is required.";
        $isError = true;
    }
    else{
        $txtUname = test_input($_POST["txtUname"]);
        // check if username only contain numbers and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtUname)){
            $error["txtUnameErr"] = "Only letters and whitespace allowed.";
            $isError = true;
        }
    }// End else

    if(empty($_POST["txtPassword"]))
    {
        $error["txtPasswordErr"] = "Password is required.";
        $isError = true;
    }
    else{
        $txtUname = test_input($_POST["txtPassword"]);
    }// End else

    if(empty($_POST["txtCPassword"]))
    {
        $error["txtCPasswordErr"] = "Confirme Password is required.";
        $isError = true;
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

 */
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
                    if($isError){
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
                        <td>Company Name:</td>
                        <td><input type="text" name="txtComName" id="txtComName" >
                            <span class="error">* <?php echo $error["txtComNameErr"]; ?></span></td>
                    </tr>
                    <tr>
                        <td>Contact Person:</td>
                        <td><input type="text" name="txtContactPerson" id="txtContactPerson" required value="<?php echo $txtContactPerson; ?>">
                            <span class="error">* <?php echo $error["txtContactPersonErr"]; ?></span></td>
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
                    <tr>
                        <td>Area of Work:</td>
                        <td><input type="text" name="txtAOW" id="txtAOW" required value="<?php echo $txtAOW; ?>">
                            <span class="error">*<?php echo $error["txtAOWErr"]; ?></td>
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
                        <td><input type="submit" name="register" id="register" value="Creat Acount"></td>
                    </tr>
                </table>
                </form>
                <a href="Profile.php">Back</a>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>