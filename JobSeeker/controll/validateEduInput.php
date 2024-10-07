<?php
// validate data
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["Degree"]))
    {
        $error["Degree"] = "Degree is required.";
        $isValid = false;
    }
    else{
        $Degree = test_input($_POST["Degree"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-'-. ]*$/", $Degree)){
            $error["Degree"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["University"]))
    {
        $error["University"] = "University name is required.";
        $isValid = false;
    }
    else{
        $University = test_input($_POST["University"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $University)){
            $error["University"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["Percentage"]))
    {
        $error["Percentage"] = "Percentage is required.";
        $isValid = false;
    }
    else{
        $Percentage = test_input($_POST["Percentage"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[0-9]*$/", $Percentage)){
            $error["Percentage"] = "Only numbers allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["PassingYear"]))
    {
        $error["PassingYear"] = "Passing Year is required.";
        $isValid = false;
    }
    else{
        $PassingYear = test_input($_POST["PassingYear"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[0-9-' ]*$/", $PassingYear)){
            $error["PassingYear"] = "Only numbers and whitespace allowed.";
            $isValid = false;
        }
    }// End else
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>