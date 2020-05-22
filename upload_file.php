<?php
 include 'db.php';
 $mn = trim($_POST['MN']);
if ($_FILES["file"]["error"] > 0)
  {
  // This replies a connection error
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  // This provides the mySQL server the data to upload to its tables
  echo "Upload: " . $_FILES["file"]["name"] . "<br>". "\n";
  echo "Type: " . $_FILES["file"]["type"] . "<br>". "\n";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>". "\n";
  echo "MN: ".$mn."<br>";
  echo "Stored temporarily as: " . $_FILES["file"]["tmp_name"]."<br><BR>". "\n";
  $currentfolder =  getcwd();
  echo "This script is running in: " .$currentfolder."<br>". "\n";
  $target_path = getcwd() ."/uploads/";
  echo "The uploaded file will be stored in the folder: ".$target_path."<br>". "\n";

  $target_path = $target_path . basename( $_FILES['file']['name']); 
  $imagename = "uploads/". basename( $_FILES['file']['name']); 
  echo "The full file name of the uploaded file is '". $target_path."'<br>". "\n";

  echo "The relative name of the file for use in the IMG tag is " . $imagename ."<br><br>". "\n";;

if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['file']['name']). " has been uploaded<br>". "\n";
   
    // Create a database entry for this image
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
  
  // This replies a successful connection to the mySQL server
  echo 'Connected successfully to mySQL. <BR>'; 
  $file_name =  $_FILES["file"]["name"];
  $query = "INSERT INTO images (MN, ImageFile) VALUES ('$mn', '$file_name')";
  echo $query."<br>\n";
   echo  "<a href='AddImage.php?MN=";
   echo $mn;
   echo "'>Add another image for this computer </a></p>\n";
/* Try to insert the new computer into the database */
if ($result = $mysqli->query($query)) {
        echo "<p>You have successfully entered $target_path into the database.</P>\n";
       
    }
    else
    {
        echo "Error entering $MN into database: " . mysqli_connect_error()."<br>";
    }
    $mysqli->close();
    echo "<img src='$imagename' width='150'><br>";

}
// This replies an error between the transmiting data and the mySQL server
else{
    echo "There was an error uploading the file, please try again!";
}
  }
  
  include 'footer.php'
?> 