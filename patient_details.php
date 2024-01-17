<?php
  $servername = "localhost";
  $username = "root";
  $password = "pakistan12345";
  $dbname = "covid";
print_r('dose');
  $name = $_POST['ptname'];
  $gender = $_POST['gender'];
  $age    = $_POST['age'];
  $contact = $_POST['contact'];
  $dose    = $_POST['dose'];
  $desc    = $_POST['desc'];
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO patient (Name, Age, Contact,Gender,Vaccine,Description) VALUES ('$name',$age,$contact,'$gender','$dose','$desc')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: main.php?message_add=success");

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  

  
?>
