<?php
require("../config/connection.php");
$isValid = true;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["updateProfile"])){
        //validate user input
        require("controll/validateUserInput.php");
        //check if all user input is valid data
        if($isValid){
            
            
            $query = "SELECT*FROM employer_Reg WHERE UserName='$txtUname' AND EmployerId!='{$_SESSION["user"]["EmployerId"]}'; ";
            $res = mysqli_query($conn, $query);
            //Check if it is a uniqe username
            if( mysqli_num_rows($res) == 0 ){
                //then updata the data
                $query = "UPDATE employer_Reg SET CompanyName='$txtComName', ContactPerson='$txtContactPerson', Address='$txtAddress', City='$txtCity', Email='$txtEmail', Mobile='$txtMobile', Area_Work='$txtAOW',UserName='$txtUname'  WHERE EmployerId = '{$_SESSION["user"]["EmployerId"]}'; ";
                $retval = mysqli_query($conn, $query);
                if(!$retval){
                    echo '<script> alert("Could not update data.");</script>';
                }else{
                    $_SESSION["message"] = "Updated data successfully.";
                    #echo '<script> alert("Updated data successfully.");</script>';
                    header("Location: Profile.php");
                    exit();
                }

            }else{
                echo '<script> alert("There is already such username, Please enter another one.");</script>';
                
            }
        }

    }//
            


    if(isset($_POST["addJob"])){

        include("controll/validateJobInput.php");
          //check if the data is valid insert data if it is valid
          if($isValid){
            $query = "INSERT INTO job_master(CompanyName, jobTitle, Vacancy, MinQualification, Description)";
            $query.="VALUES('{$_SESSION["user"]["CompanyName"]}','$jobTitle',$jobVacancy, '$jobQualification', '$jobDescription');";

            //Insert data to the database
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                $db_error = "DB_ERROR: Sorry coudn't insert data.";
                $isError=true;
                echo '<script> alert("DB_ERROR: Sorry coudn not insert data.");</script>';
            }
            else{
                echo '<script> alert("Added data successfuly.");</script>';
    
            }
          }
        

    }
    if(isset($_POST["DeleteJob"])){
        if(isset($_POST["recordId"])){
            $query = "DELETE FROM job_master WHERE JobId={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not delete record.");</script>';
            }
            else{
                echo '<script> alert("Deleted data successfuly.");</script>';
            }
        }
    }
    //
    //Edite Job
    //
    if(isset($_POST["EditJob"])){
        if(isset($_POST["recordId"])){
            $query = "SELECT*FROM job_master WHERE JobId={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not delete record.");</script>';
            }
            else{
                $result_set=mysqli_fetch_assoc($retval);
                $_SESSION["EditJob"]=$result_set;
                header("location: EditJob.php" );
                echo '<script> alert("Deleted data successfuly.");</script>';
            }
        }
    }
    //
    //Update Job data
    //
    if(isset($_POST["updateJob"])){
        //validate user input
        include("controll/validateJobInput.php");
        //check if all user input is valid data
        if($isValid){
          $query = "UPDATE job_master SET JobTitle='$jobTitle', Vacancy=$jobVacancy, MinQualification='$jobQualification', Description='$jobDescription' WHERE JobId='{$_POST["jobId"]}'";

          //Execute query
          $retval = mysqli_query($conn, $query);
          if(!$retval){
              $db_error = "DB_ERROR: Sorry coudn't update data.";
              $isError=true;
   
              echo '<script> alert("DB_ERROR: Sorry coudn not update data.");</script>';
          }
          else{
            $_SESSION["message"] = "Updated data successfuly.";
              #echo '<script> alert("Updated data successfuly.");</script>';
              header("location: ManageJob.php");
              exit(); 
          }
        }
    }//
    
    //
    // Add Walkin action========================================
    //
    if(isset($_POST["addWalkin"])){
        include("controll/validateJobInput.php");
        //check if the data is valid insert data if it is valid
        if($isValid){
            $date = $_POST["date"];
            $time = $_POST["time"]; 
            $time = date("h:i:sa", strtotime($time));
          $query = "INSERT INTO walkin_master(CompanyName, JobTitle, Vacancy, MinQualification, Description, InterviewDate, InterviewTime )";
          $query.="VALUES('{$_SESSION["user"]["CompanyName"]}','$jobTitle',$jobVacancy, '$jobQualification', '$jobDescription','$date','$time');";
          //echo $query;

          //Insert data to the database
          $retval = mysqli_query($conn, $query);
          if(!$retval){
              $db_error = "DB_ERROR: Sorry coudn't insert data.";
              $isError=true;
              echo '<script> alert("DB_ERROR: Sorry coudn not insert data.");</script>';
          }
          else{
              echo '<script> alert("Added data successfuly.");</script>';
  
          }
        }
        

    }
    if(isset($_POST["DeleteWalkin"])){
        if(isset($_POST["recordId"])){
            $query = "DELETE FROM walkin_master WHERE WalkInId={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not delete record.");</script>';
            }
            else{
                echo '<script> alert("Deleted record successfuly.");</script>';
            }
        }

    }
    //
    //Edite Walkin
    //
    if(isset($_POST["EditWalkin"])){
        if(isset($_POST["recordId"])){
            $query = "SELECT*FROM walkin_master WHERE WalkinId={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not delete record.");</script>';
            }
            else{
                $result_set=mysqli_fetch_assoc($retval);
                $_SESSION["EditWalkin"]=$result_set;
                header("location: EditWalkin.php" );
                exit();
            }
        }
    }
    //
    //update Walkin
    //
    if(isset($_POST["updateWalkin"])){
        //validate user input
        include("controll/validateJobInput.php");
        //check if all user input is valid data 
        if($isValid){
            $date = $_POST["date"];
            $time = $_POST["time"];         
          $query = "UPDATE walkin_master SET JobTitle='$jobTitle', Vacancy=$jobVacancy, MinQualification='$jobQualification', Description='$jobDescription', InterviewDate='$date', InterviewTime='$time' WHERE WalkInId='{$_POST["WalkinId"]}'";

          //Execute query
          $retval = mysqli_query($conn, $query);
          if(!$retval){
              $db_error = "DB_ERROR: Sorry coudn't update data.";
              $isError=true;
   
              echo '<script> alert("DB_ERROR: Sorry coudn not update data.");</script>';
          }
          else{
            $_SESSION["message"] = "Updated data successfuly.";
              #echo '<script> alert("Updated data successfuly.");</script>';
              header("location: ManageWalkin.php");
              exit(); 
          }
        }
    }//
//
    if(isset($_POST["searchApplication"])){
        if(isset($_POST["selectedJobTitle"])){
            
            if($_POST["selectedJobTitle"]=="all"){
                $JobId=get_all_jobId();
                $status=get_status();
                $query = "SELECT b.ApplicationId, a.JobSeekerName, a.City, a.Email, b.Status FROM jobseeker_reg a, application_master b WHERE a.JobSeekId=b.JobSeekId AND b.Status IN ($status) AND b.JobId IN ($JobId);";
            }else{
                $JobId =$_POST["selectedJobTitle"];
                //echo $JobId;
                //$query = "SELECT application_master.ApplicationId, jobseeker_reg.JobSeekerName, jobseeker_reg.City, jobseeker_reg.Email, application_master.Status FROM inner join application_master.JobSeekerId, jobseeker_reg.JobSeekerId WHERE JobId= '$JobId'  ;";//AND JobSeekerId=(SELECT JobSeekerId WHERE JobId= {$POST["selectedJobTitle"]})
                $query = "SELECT b.ApplicationId, a.JobSeekerName, a.City, a.Email, b.Status FROM jobseeker_reg a, application_master b WHERE a.JobSeekId=b.JobSeekId AND b.JobId = $JobId  ;";
                //echo $query2;
            }

            $res = mysqli_query($conn, $query);  
            if(!$res){
                echo '<script> alert("Could not delete record.");</script>';
            }
            else{
                //echo '<script> alert("Deleted record successfuly.");</script>';
                $data_set = mysqli_fetch_all($res, 2);
            }
        }
    }
    
    // On View application butunn clicked, show detail
    if(isset($_POST["ViewApplication"])){
        if(isset($_POST["recordId"])){
            $query = "SELECT JobSeekId,JobId, Status FROM application_master WHERE ApplicationId={$_POST["recordId"]};";
            $res =  mysqli_query($conn, $query);
            $result_set = mysqli_fetch_assoc($res);

            $_SESSION["JobSeekId"] = $result_set["JobSeekId"];
            $_SESSION["JobId"] = $result_set["JobId"];
            $_SESSION["Status"] = $result_set["Status"];

            $query = "SELECT*FROM jobseeker_reg WHERE JobSeekId={$result_set["JobSeekId"]};";
            $query2 = "SELECT Degree, University, PassingYear,Percentage FROM jobseeker_education WHERE JobSeekId={$result_set["JobSeekId"]};";
            $res = mysqli_query($conn, $query);
            $res2 = mysqli_query($conn, $query2);
            if(!$res && !$res2){
                echo '<script> alert("DB_ERROR: Could not get detail record.");</script>';
            }
            else{
                $_SESSION["Application_id"] = $_POST["recordId"];
                $_SESSION["personal_info"] = mysqli_fetch_array($res, 1);
                $_SESSION["education_info"] = mysqli_fetch_all($res2, 1);
                if(is_file("jobSeeker_detail.php")){
                    header("Location: jobSeeker_detail.php");
                    //exit();
                }else{
                    echo '<script> alert("NOT FOUND: The URL not exist in the server.");</script>';
                }
                
            }
        }
        

    }

    if(isset($_POST["sendCallLetter"])){
        //validat data
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
                
            if (empty($_POST["CallLetterDes"])) {
                $CallLetterDesErr="Please write call lettrer";
                $isValid = false;
            }
            else {
                $CallLetterDes = test_input($_POST["CallLetterDes"]);
            }
        }

        if ($isValid) {
            //Update the statuse of applications
            $query = "UPDATE application_master SET Status='Call Letter Send', Description='$CallLetterDes' WHERE ApplicationId=$AppId ";
            $retval = mysqli_query($conn, $query);

            if (!$retval) {
                echo '<script> alert("ERROR: Coud not send latter"); </script>';
            }else {
                echo '<script>alert("Latter Sent Successfuly.");</script>';
            }
        }//End if
    }

}

function get_all_jobId(){
    $query="SELECT JobId FROM job_master WHERE CompanyName='{$_SESSION["user"]["CompanyName"]}';";
    $res = mysqli_query($GLOBALS["conn"], $query);  
    if(!$res){
        echo '<script> alert("Could not Get record.");</script>';
    }
    else{
        //echo '<script> alert("Deleted record successfuly.");</script>';
        $job_id = mysqli_fetch_all($res, 2);
        $job_id=array_column($job_id,0);
        $job_id = implode(",",$job_id);
        //print_r($job_id);
        return $job_id;
    } 
}

function get_status(){
    $status=array("\"apply\"", "\"Call Latter Send\"");
    $stat=array("apply", "Call Latter Send");
    try{
    if(isset($_POST["Status"])){
        if(in_array($_POST["Status"],$stat)){
            $status = "\"".$_POST["Status"]."\"";
            //echo "<span>$status</span>";
            return $status;
        }else{
            $status = implode(",", $status);
            //echo "<span>$status</span>";
            return $status;
        }
    }
   }catch(Exception $e){
    echo $e->getMessage();
   }
}

?>