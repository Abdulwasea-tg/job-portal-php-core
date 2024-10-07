<?php 
  /*
    // Initialize a file URL to the variable 
    $url =  
    'https://media.geeksforgeeks.org/wp-content/uploads/gfg-40.png'; 
      
    // Use basename() function to return the base name of file 
    $file_name = basename($url); 
      
    // Use file_get_contents() function to get the file 
    // from url and use file_put_contents() function to 
    // save the file by using base name 
    if (file_put_contents($file_name, file_get_contents($url))) 
    { 
        echo "File downloaded successfully"; 
    } 
    else
    { 
        echo "File downloading failed."; 
    } 

   */ 
?>
<?php 

// The location of the PDF file 
// on the server 
$dir = "../uploads/"; 
$file_name = $_GET["filename"];
$filename = $dir.$file_name;
//echo $filename;
// Header content type 
header("Content-type: application/pdf"); 

header("Content-Length: " . filesize($filename)); 

// Send the file to the browser. 
readfile($filename); 
?> 
