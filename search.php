<!DOCTYPE html>
<html>
<title>Search Patient</title>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
       
  }
}
function fetchdata(id)
{ 
console.log(id);
console.log(id['Name']);
document.getElementById("ptid").value=id['id'];
document.getElementById("ptname").value=id['Name'];
document.getElementById("ptage").value=id['Age'];
document.getElementById("dose").selected=id['Vaccine'];
document.getElementById("ptgender").value=id['Gender'];
$("input[name=gender]").val([id['Gender']]);
$("#dose").val([id['Vaccine']]);
document.getElementById("ptdescription").value=id['Description'];
document.getElementById("ptcontact").value=id['Contact'];  
}
// sweetAlert({
//   title: "An input!",
//   html: "<form action='verify.php' method='post'><input id='user' type='email'><input id='pass' type='password'><input id='idno' type='number'><submit></form>",

//   showCancelButton: true,
//   closeOnConfirm: false,
//   animation: "slide-from-top"
//   }, function(inputValue){
//     console.log("You wrote", inputValue);   
// });

// }
</script>
<style>
     form {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            padding: 0px 30px;
            margin-bottom: 2px;
        }

        form input,
        form textarea {
            padding: 5px;
            margin: 5px;
        }

        form label {
            margin-left: 5px;
        }

        form .butti {
            margin: 5px;
        }

        form .butti input {
            width: 330px;
            height: 30px;
            background-color: #0275d8;
            color: white;
            border: none;
        }

        form .butti input:hover {
            cursor: pointer;
            background-color: #0366bd;
        }

        button:hover {
            cursor: pointer;
            background-color: #0366bd;
        }
    #myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 50%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
  background-color: white;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
</style>
</head>
<body>
    <div id="bd_img" style="background-image:url('main_background.png'); width: 100%;min-height:950px;height:100%;">
    <div style="padding-top:10%;padding-left:13%;margin-right:15%;">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
 <table class="table" id="myTable" >
  <thead>
    <tr>
    <th  scope="col" >ID</th>
        <th  scope="col">Name</th>
        <th  scope="col">Age</th>
        <th  scope="col">Phone No.</th>
        <th  scope="col">Gender</th>
        <th  scope="col">Vaccine</th>
            <th  scope="col">Description</th>
            <th  scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "pakistan12345";
  $dbname = "covid";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT  * FROM patient";
  $result = mysqli_query($conn, $sql);
  $i      = 1;
  if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        $data['id']=$row['Id'];
        $data['Name']=$row['Name'];
        $data['Age']=$row['Age'];
        $data['Contact']=$row['Contact'];
        $data['Gender']=$row['Gender'];
        $data['Vaccine']=$row['Vaccine'];
        $data['Description']=$row['Description'];
        $editdata=json_encode($data);
        echo "<tr>";
        echo "<td class='info'>" . $i . "</td>";
        echo "<td class='info'>" . $row['Name'] . "</td>";
        echo "<td class='info'>" . $row['Age'] . "</td>";
        echo "<td class='info'>" . $row['Contact'] . "</td>";
        echo "<td class='info'>" . $row['Gender'] . "</td>";
        echo "<td class='info'>" . $row['Vaccine'] . "</td>";
        echo "<td class='info'>" . $row['Description'] . "</td>";
        echo "<td class='info'><button type='button' class='btn btn-info ' data-toggle='modal' data-target='#myModal' onclick='fetchdata($editdata)'>Edit</button><button type='button'style='margin-left:10px;' class='btn btn-info'><a href='delete.php?id=".$data['id']."' style=' color: white;'>Delete</a></button>
        <button type='button'style='margin-left:10px;' class='btn btn-info'><a href='Report.php?id=".$data['id']."' style=' color: white;'>Report</a></button></td></tr>";
          $i++;
    }

    } 

?>
  </tbody>
 </table>
    </div>
</div>




  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
        <div id="form">
            <form method="post" action="update.php">
            <h4 class="modal-title" style="float: left;">Edit PatientData</h4>
            <input type="text" name="ptid" id="ptid" style="display: none;">
                <label for="ptname">Patient Name <span style="color:red;">*</span></label>
                <input type="text" name="ptname" id="ptname" placeholder="Name" required>
                <!-- <label for="id">Patient Id <span style="color:red;">*</span></label>
                <input type="text" name="id" placeholder="Id" required> -->

                <div>
                    <div>
                        <label for="age">Patient Age <span style="color:red;">*</span></label>
                        <input type="number" name="age" id="ptage" placeholder="Age" required style="width:150px" min="12"
                            max="500">
                    </div>
                    <div>
                        <label for="phone">Contact No.<span style="color:red;">*</span></label>
                        <input name="contact" placeholder="Contact No" id="ptcontact" required style="width:150px">
                    </div>
                    <div>
                        <br>
                        <div style=" display:flex;">
                            <label for="gender">Gender: <span style="color:red;">*</span></label>
                            <div style="margin-right:10px;margin-left: 10px;"><input type="radio" id="ptgender" name="gender"
                                    value="male" style="margin-right: 2px;">Male</div>
                            <div style="margin-right:10px;margin-left: 10px;"><input type="radio" id="ptgender"  name="gender"
                                    value="female" style="margin-right: 2px;">Female</div>
                        </div>
                    </div>
                    <div>
                        <label for="dose">Choose Vaccine:</label>
                        <select name="dose" id="dose" style="border-radius: 0px;" >
                            <option value="Pfizer" style="border-radius: 0px;" >Pfizer</option>
                            <option value="sino_vac" style="border-radius: 0px;">Sino Vac</option>
                        </select>
                    </div>
                    <br>
                </div>
                <label for="desc">Description <span style="color:red;">*</span></label>
                <textarea name="desc" cols="28" id="ptdescription" rows="5" placeholder="" required></textarea>
        </div>
                <div class="modal-footer">
                <input class="btn btn-primary" type="submit" style="margin:0px;"  /></div>
            </form>
        </div>
      </div>
      
    </div>
  </div>
  

<?php
  if ($_REQUEST['message_deleted'] == 'success') {
        echo '<script>alert("Deleted data successfully")</script>';
        // header("Location: search.php");
    $_REQUEST['message_deleted'] = "";
    
    }
elseif($_REQUEST["message_updated"] == 'success')
    {
        echo '<script>alert("updated data successfully")</script>';
        // header("Location: search.php");
        unset($_REQUEST['message_updated']);
    }

    ?>
  






</body>

</html>