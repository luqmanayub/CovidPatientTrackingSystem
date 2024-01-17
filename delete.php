<?php
 print_r($_REQUEST);
 
 $servername = "localhost";
 $username = "root";
 $password = "pakistan12345";
 $dbname = "covid";
 $id = $_REQUEST['id'];
//  $name = $_POST['ptname'];
//  $gender = $_POST['gender'];
//  $age    = $_POST['age'];
//  $contact = $_POST['contact'];
//  $dose    = $_POST['dose'];
//  $desc    = $_POST['desc'];
 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
 $sql = "DELETE FROM patient WHERE id='$id'";

 if (mysqli_query($conn, $sql)) {
    header("Location: search.php?message_deleted=success");
   echo "Record deleted successfully";
 } else {
   echo "Error deleting record: " . mysqli_error($conn);
 }
 
 
 mysqli_close($conn);

 
?>