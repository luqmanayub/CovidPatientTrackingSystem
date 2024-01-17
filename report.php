<?php
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
 $sql = "SELECT * FROM patient WHERE id='$id'";
 $result = mysqli_query($conn, $sql);
 $i      = 1;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $id          = $row['Id'];
        $name       = $row['Name'];
        $Age         = $row['Age'];
        $Contact     = $row['Contact'];
        $Gender      = $row['Gender'];
        $Vaccine     = $row['Vaccine'];
        $Description = $row['Description'];
        ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>
    <style>
       

        .header {
            width: 100vw;
            background-color: rgb(25, 25, 25);
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .header h1,
        .header p {
            color: white;
        }

        .header h1 {
            margin-bottom: 0px;
        }

        form {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            padding: 0px 30px;
            margin-bottom: 2px;
        }
        form label {
            margin-left: 5px;
            font-size: 24px;
        }

        #form {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            border: 1px solid black;
            padding: 20px;
            width: 600px;
            margin: 20px auto;
        }

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    <div id="bd_img" style="background-image:url('main_background.png'); width: 100%;min-height:550px;height: 100%;">
    <!-- <div class="header">
        <h1>Hospital</h1>
        <p>Covid Patient records Management</p>
    </div> -->
        <div id="form">
            <h2 style="margin:10px auto;  text-align:center;">Patient Report</h2>
            <p>______________________________________________________________________</p>
            <form>
                <label for="ptname">Patient Name : <?php print($name);?></label>
                <p>___________________________________________________________________</p>                <!-- <label for="id">Patient Id <span style="color:red;">*</span></label>
                <input type="text" name="id" placeholder="Id" required> -->
                <div>
                    <div>
                        <label for="age">Patient Age : <?php print($Age);?></label>
                        <p>_________________________________________________________________</p>                    </div>
                    <div>
                        <label for="phone">Contact No.<?php print($Contact);?></label>
                        <p>_________________________________________________________________</p>                    </div>
                    <div>
                        <div >
                            <label for="gender">Gender:<?php print($Gender);?> </label>
                        <p>_________________________________________________________________</p>                        </div>
                    </div>
                    <div>
                        <label for="dose">Vaccine Name: <?php print($Vaccine);?></label>
                        <p>________________________________________________________________</p>                </div>
                <label for="desc">Description : <?php print($Description);?></label>
            </form>
        </div>
    </div>
</body>

</html>
<?php
    }
}?>