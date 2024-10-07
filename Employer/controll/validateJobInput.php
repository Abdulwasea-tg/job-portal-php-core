<?php


if(empty($_POST["jobTitle"]))
    {
        $error["jobTitleErr"] = "Job title is required.";
        $isValid = false;
    }
    else{
        $jobTitle = test_input($_POST["jobTitle"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-' ]*$/", $jobTitle)){
            $error["jobTitleErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["jobVacancy"]))
    {
        $error["jobVacancyErr"] = "Job vacancy is required.";
        $isValid = false;
    }
    else{
        $jobVacancy = test_input($_POST["jobVacancy"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[0-9- ]*$/", $jobVacancy)){
            $error["jobVacancyErr"] = "Only numbers and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["jobQualification"]))
    {
        $error["jobQualificationErr"] = "Job Qualification is required.";
        $isValid = false;
    }
    else{
        $jobQualification = test_input($_POST["jobQualification"]);
        // check if name only contain letters and whitspace
        if(!preg_match("/^[a-zA-Z-.' ]*$/", $jobQualification)){
            $error["jobQualificationErr"] = "Only latters and whitespace allowed.";
            $isValid = false;
        }
    }

    if(empty($_POST["jobSalary"]))
    {
        $jobSalary ="";
    }
    else{
        $jobSalary = test_input($_POST["jobSalary"]);
        // check if mobile only contain numbers and whitspace
        if(!preg_match("/^[0-9- ]*$/", $jobSalary)){
            $error["jobSalaryErr"] = "Only numbers and whitespace allowed.";
            $isValid = false;
        }
    }// End else

    if(empty($_POST["jobDescription"]))
    {
        $jobDescription= "";
    }else{
        $jobDescription= test_input($_POST["jobDescription"]);
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>