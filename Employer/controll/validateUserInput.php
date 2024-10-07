<?php
if(empty($_POST["txtComName"]))
    {
        $error["txtComNameErr"] = "Company name is required.";
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

    if(empty($_POST["txtContactPerson"]))
    {
        $error["txtContactPersonErr"] = "Contact person is required.";
        $isValid = false;
    }
    else{
        $txtContactPerson = test_input($_POST["txtContactPerson"]);
        // check if Contact person name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtContactPerson)){
            $error["txtContactPersonErr"] = "Only latters and whitespace allowed.";
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

    if(empty($_POST["txtAOW"]))
    {
        $error["txtAOWErr"] = "Area of work is required.";
        $isValid = false;
    }
    else{
        $txtAOW = test_input($_POST["txtAOW"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $txtAOW)){
            $error["txtAOWErr"] = "Only letters and whitespace allowed.";
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





function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>