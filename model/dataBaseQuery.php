<?php 

    define("hostname" , "localhost");
    define("username" , "");
    define("password" , "");
    define("database" , "job");
function db_setData($query){

    try {
        $conn = mysqli_connect(hostname, username, password, database);
        if(!$conn){
            echo("Erorr: Couden't connect to the database.");
        }else{
            $res = mysqli_query($conn, $query);
            if(!$res){
                echo("Erorr: Couden't insert data to the database.");
            }
        }
        //close the connection
        mysqli_close($conn);
        return $res;

    } catch (Exception $e) {
        echo '<script>alert("DB_ERROR: Couden\'t connect to the database"); </script>';
        //echo $e->getMessage();
    }

}

function db_getData($query){
    try {
        $conn = mysqli_connect(hostname, username, password, database);
        if(!$conn){
            echo("Erorr: Couden't connect to the database.");
        }else{
            $res = mysqli_query($conn, $query);
            if(!$res){
                echo("Erorr: Couden't insert data to the database.");
            }
        }
        //close the connection
        mysqli_close($conn);
        return $res;

    } catch (Exception $e) {
        echo '<script>alert("DB_ERROR: Couden\'t connect to the database"); </script>';
        //echo $e->getMessage();
    }
    
}
function selectData($query){
    $con = mysqli_connect();
    $res = $con;
    return $res;

}


function insertData($query){

}
function updateData($query){

}

function deleteData($query){

}


?>