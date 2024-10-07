<?php 
session_start();
require("../config/connection.php");
//require("../model/dataBaseQuery.php");
$isError=false;
$db_error="";
/* $txtComName=$txtContactPerson=$txtAddress=$txtCity=$txtEmail=$txtMobile=$txtAOW=$txtUname=$txtPassword=$txtCPassword="";
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
); */
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["register"])){
        //validate the input data
        require("../config/validateEmploerReg.php");

        //check if the data is valid insert data if it is valid
        if(!$isError && $txtPassword==$txtCPassword){
            //Check if it is a uniqe username
            $query = "SELECT UserName FROM employer_reg WHERE UserName='$txtUname'; ";
            $res = mysqli_query($conn, $query);
            if(mysqli_num_rows($res) == 0){
                //then insert the data
                $query = "INSERT INTO employer_reg(CompanyName, ContactPerson, Address, City, Email, Mobile, Area_Work,UserName, Password, Question,Answer)";
                $query.="VALUES('$txtComName','$txtContactPerson', '$txtAddress', '$txtCity', '$txtEmail', '$txtMobile', '$txtAOW', '$txtUname', '$txtPassword', 'how is your father','Tawfeeq');";
                //Insert data to the database
                $retval = mysqli_query($conn, $query);
                if(!$retval){
                    $db_error = "DB_ERROR: Sorry coudn't insert data.";
                    $isError=true;
                    echo '<script> alert("DB_ERROR: Sorry coudn not insert data.");</script>';
                }
                else{
                    echo '<script> alert("The registration don successfuly.You will not be able to login until it be confimed.");</script>';
                    header("Location:../app/login.php");
                }
            }else{
                echo '<script> alert("There is already such username, Please enter another one.");</script>';
                
            }


        }//EOF
        else{
            echo "<script> alert('ERROE: Confirm password: $txtCPassword most be match to the Password.');</script>";
        }

    }//End of rigster

    //Job Seeker registration=============================
    if(isset($_POST["btnJobSReg"])){
        //validate the input data
        require("../config/validateJobSeekerReg.php");
        echo "btn job seeker pressed";

        //check if the data is valid insert data if it is valid
        if($isValid && $txtPassword==$txtCPassword){
            //Check if it is a uniqe username
            $query = "SELECT UserName FROM jobseeker_reg WHERE UserName='$txtUname'; ";
            $res = mysqli_query($conn, $query);
            if(mysqli_num_rows($res) == 0){
                //then insert the data
                $query = "INSERT INTO jobseeker_reg(JobSeekerName, Address, City, Email, Mobile, Qualification, Gender, BirthDate, Resume, UserName, Password, Question,Answer)";
                $query.="VALUES('$txtName', '$txtAddress', '$txtCity', '$txtEmail', '$txtMobile', '$txtQualification','$gender', '$birthOD', '$Resume', '$txtUname', '$txtPassword', 'how is your father','Tawfeeq');";
                //Insert data to the database
                $retval = mysqli_query($conn, $query);
                if(!$retval){
                    $db_error = "DB_ERROR: Sorry coudn't insert data.";
                    $isError=true;
                    echo '<script> alert("DB_ERROR: Sorry coudn not insert data.");</script>';
                }
                else{
                    echo '<script> alert("The registration don successfuly.You will not be able to login until it be confimed.");</script>';
                    header("Location:../app/login.php");
                }
            }else{
                echo '<script> alert("There is already such username, Please enter another one.");</script>';
                
            }


        }//EOF
        else{
            echo "<script> alert('ERROE: Confirm password: $txtCPassword most be match to the Password.');</script>";
        }

    }//End of rigster
    

    //User login
    if(isset($_POST["login"])){
        $username=$password=$user_type="";
        $usernameErr=$passwordErr=$user_typeErr="";
        $isError = false;

        require("../config/validatLogin.php");
        if(!$isError){
            if($_POST["user_type"]=="Employer"){
                $query = "SELECT*FROM employer_reg WHERE UserName='$username' AND "."Password='$password'";
                var_dump($query);
                $res = mysqli_query($conn, $query);
                if(!$res){
                    die('<script> alert("Error:Coud not access database.");</script>');
                }
                $result_set= mysqli_fetch_all($res, 1);
                print_r($result_set);
                print(count($result_set));
                
                if(count($result_set) !=0){
/*                     $query = "SELECT 'EmployerId' FROM employer_reg WHERE 'UserName'='$username'";
                    $res = mysqli_query($conn, $query);
                    if($res){
                        $result_set = mysqli_fetch_assoc($res);
                        $_SESSION["EmployerId"] = $result_set;
                    } */
                    $_SESSION['username'] = $username;
                    $_SESSION["password"] = $password;
                    print($_SESSION["username"]);
                    //echo '<script> alert("{$_SEETION["username"]} loged in sacessfuly.");</script>';
                    header('Location: ../Employer/index.php');
                    //exit();//die() 
                    
                }
                else{
                    echo '<script> alert("Error username or password.");</script>';
                    $db_error = "Error username or password.";
                    $isError=true;
                }
            }//End if
            if($_POST["user_type"]=="JobSeeker"){
                $query = "SELECT*FROM jobseeker_reg WHERE UserName='$username' AND Password='$password';";
                $res = mysqli_query($conn, $query);
                $result_set= mysqli_fetch_all($res, 1);

                if(count($result_set) !=0){
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    header('Location: ../JobSeeker/index.php');
                    exit();//die() */
                    
                }
                else{
                    echo '<script> alert("Error username or password.");</script>';
                    $db_error = "Error username or password.";
                    $isError=true;
                }
            }//End if
            if($_POST["user_type"]=="Admin"){
                $query = "SELECT*FROM user_master WHERE UserName='$username' AND "."Password='$password'";
                $res = mysqli_query($conn, $query);
                $result_set= mysqli_fetch_all($res, 1);

                if(count($result_set) !=0){
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;
                    header('Location: ../admin/index.php');
                    exit();//die() */
                    
                }
                else{
                    $db_error = "Error username or password.";
                    $isError=true;
                }
            }

        }


    }
    
}
//var_dump($error);



?>