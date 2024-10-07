<?php 
include("..//gridview.php");

?>

<?php 


?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../gridviewStyle.css">
    <link rel="stylesheet" type="text/css" href="../css.css">

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

            <h3>Edit User</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                <form action="" method="post">
                <table>
                    <thead><td>Edit Record</td></thead>
                    <tr>
                        <td>Id:</td>
                        <td><input type="text" name="txtUserId" id="txtUserId" value=""></td>
                    </tr>
                    <tr>
                        <td>UserName:</td>
                        <td><input type="text" name="txtUName" id="txtUName" value=""></td>
                    </tr>
                    <tr>
                        <td>Passowrd:</td>
                        <td><input type="password" name="txtPass" id="txtPass" value=""></td>
                    </tr>
                    <tr>
                        <td>Confirme Passowrd:</td>
                        <td><input type="password" name="txtConfPass" id="txtConfPass" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="EditUser" value="Update Record"></td>
                    </tr>
                </table>
                </form>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>