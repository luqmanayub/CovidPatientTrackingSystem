<?php
 print_r($_POST);

 $servername = "localhost";
 $username = "root";
 $password = "pakistan12345";
 $dbname = "covid";

 $id    = $_POST['ptid'];
 $name = $_POST['ptname'];
 $gender = $_POST['gender'];
 $age    = $_POST['age'];
 $contact = $_POST['contact'];
 $desc    = $_POST['desc'];
 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }

 $sql = "UPDATE patient SET Name='$name',Age=$age,Contact=$contact,Gender='$gender',Description='$desc' WHERE id=$id";

 if (mysqli_query($conn, $sql)) {
    
    header("Location: search.php?message_updated=success");
   echo "Record updated successfully";
 } else {
   echo "Error updating record: " . mysqli_error($conn);
 }
 
 mysqli_close($conn);


 ?>
 
