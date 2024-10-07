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

            <h3>Edit News</h3>    
        </span>
        
        <!-- countent1 -->
        <div>
             <!-- countent2 -->
            <div class="container">
                <form action="" method="post">
                <table>
                    <thead><td>Edit News Record</td></thead>
                    <tr>
                        <td>Id:</td>
                        <td><input type="text" name="txtNewsId" id="txtNewsId" value=""></td>
                    </tr>
                    <tr>
                        <td>News:</td>
                        <td><input type="text" name="txtNews" id="txtNews" value=""></td>
                    </tr>
                    <tr>
                        <td>News Date:</td>
                        <td><input type="date" name="txtNewsDate" id="txtNewsDate" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="manageNews.php">Cancel</a>
                            <input type="submit" name="EditNews" value="Update Record"></td>
                    </tr>
                </table>
                </form>

            </div>

        </div>    
    </div><!-- End center -->
    
</body>
</html>