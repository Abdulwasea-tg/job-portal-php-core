<?php
require("../config/connection.php");
$isValid = true;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(isset($_POST["UpdateProfile"])){
        //validate user input
        require("controll/validateUserInput.php");
        //check if all user input is valid data
        if($isValid){
            
            
            $query = "SELECT*FROM jobseeker_reg WHERE UserName='$txtUname' AND JobSeekId != '{$_SESSION["user"]["JobSeekId"]}'; ";
            $res = mysqli_query($conn, $query);
            //Check if it is a uniqe username
            if( mysqli_num_rows($res) == 0){
                //then updata the data
                $query = "UPDATE jobseeker_Reg SET JobSeekerName='$txtName', Address='$txtAddress', City='$txtCity', Email='$txtEmail', Mobile='$txtMobile', Qualification='$txtQualification', Gender='$gender', BirthDate='$BirthDate', Resume='$Resume',UserName='$txtUname'  WHERE JobSeekId = '{$_SESSION["user"]["JobSeekId"]}'; ";
                $retval = mysqli_query($conn, $query);
                if(!$retval){
                    echo '<script> alert("Could not update data.");</script>';
                }else{
                    $_SESSION["message"]="Updated data successfully.";
                    #echo '<script> alert("Updated data successfully.");</script>';
                    header("Location: Profile.php");
                    exit();
                }

            }else{
                echo '<script> alert("There is already such username, Please enter another one.");</script>';
                
            }
        }



    }//
            


    if(isset($_POST["addEducation"])){
          //validate input
          include("controll/validateEduInput.php");
          //check if the data is valid insert data if it is valid
          if($isValid){
            $query = "INSERT INTO jobseeker_education(JobSeekId, Degree, University , PassingYear, Percentage)";
            $query.="VALUES('{$_SESSION["user"]["JobSeekId"]}','$Degree','$University', '$PassingYear', '$Percentage');";

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
    if(isset($_POST["DeleteEducation"])){
        if(isset($_POST["recordId"])){
            $query = "DELETE FROM jobseeker_education WHERE EduId={$_POST["recordId"]};";
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
    //on Edite Education button cliched
    //
    if(isset($_POST["EditEducation"])){
        if(isset($_POST["recordId"])){
            $query = "SELECT*FROM jobseeker_education WHERE EduId={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not Update record.");</script>';
            }
            else{
                $result_set=mysqli_fetch_assoc($retval);
                $_SESSION["edu_data"]=$result_set;
                header("location: EditEducation.php" );
                exit();
            }
        }
    }
    //
    //On update Education action performed
    //
    if(isset($_POST["updateEdu"])){
        //validate user input
        include("controll/validateEduInput.php");
        //check if all user input is valid data
        if($isValid){
          $query = "UPDATE jobseeker_education SET  Degree='$Degree', University='$University', PassingYear='$PassingYear', Percentage='$Percentage' WHERE EduId='{$_POST["EduId"]}';";
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
              header("location: ManageEducation.php");
              //exit(); 
          }
        }
    }//
    
    // Add Walkin action========================================

//Apply action
        if(isset($_POST["ApplyJob"])){
            //echo "Apply Pressed";
            if(isset($_POST["recordId"])){
                //echo $_POST["recordId"];
                $query = "INSERT INTO application_master(JobSeekId, JobId, Status, Description)";
                $query .= "VALUES( '{$_SESSION["user"]["JobSeekId"]}', {$_POST["recordId"]}, 'apply', 'NO MESSAGE');";
                $retval = mysqli_query($conn, $query);
                if(!$retval){
                    echo '<script> alert("Could not apply for the job.");</script>';
                }
                else{
                    echo '<script> alert("Applied job successfuly.");</script>';
                }
            }
    
        }

            //
    //on Edite Education button cliched
    //
    if(isset($_POST["DetailJob"])){
        if(isset($_POST["recordId"])){
            $query = "SELECT*FROM job_master WHERE JobId={$_POST["recordId"]};";
            $retval = mysqli_query($conn, $query);
            if(!$retval){
                echo '<script> alert("Could not Update record.");</script>';
            }
            else{
                $result_set=mysqli_fetch_assoc($retval);
                $_SESSION["job_data"]=$result_set;
                header("location: job_detailse.php" );
                exit();
            }
        }
    }



        
    

        if(isset($_POST["Search"])){
            if(isset($_POST["selectedJobQualification"]) && !isset($_POST["selectedCompanyName"])){

                $query = "SELECT*FROM job_master  WHERE MinQualification='{$_POST["selectedJobQualification"]};";
                $res = mysqli_query($conn, $query);
            }
            if(isset($_POST["selectedJobQualification"]) && isset($_POST["selectedCompanyName"])){
                //$qualification = implode("|",$_POST["selectedJobQualification"]);
                
                $query = "SELECT*FROM job_master WHERE MinQualification = '{$_POST["selectedJobQualification"]}' AND CompanyName = '{$_POST["selectedCompanyName"]}';";
                $res = mysqli_query($conn, $query);
            }
           /*  if(isset($_POST["selectedJobQualification"]) && isset($_POST["selectedCompanyName"]) && isset($_POST["selectedAOW"])){
                $query = "SELECT*FROM job_master a,employer_reg b WHERE a.MinQualification='{$_POST["selectedJobQualification"]} AND a.CompanyName = '{$_POST["selectedCompanyName"]}' AND b.Area_Work = '{$_POST["selectedAOW"]}';";
            } */

            if(!$res){
                echo '<script> alert("DB_ERROR: Could not feach record.");</script>';
            }
            else{
                //echo '<script> alert("Deleted record successfuly.");</script>';
                $available_jobs= mysqli_fetch_all($res, 2);
            }

        }
}
?>