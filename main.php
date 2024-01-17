
<html>

<head>
    <link rel="stylesheet" type="text/css" href="main.css">
    <style>
        .card-group {
            padding-top: 20%;
            padding-left: 20%;
            padding-right: 20%;
        }

        .card {
            margin-right: 4%;
        }

        .card-body {
            background-color: #051c69;
            color: white;
        }

        .card-img-top {
            height: 75%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<title>Covid Patient Tracking System</title>

<body>
    <!-- <img src="main_background.png" width="1900" height="935" class="base-img" alt="Covid Patient Tracking System" /> -->

    <div id="bd_img" style="background-image:url('main_background.png'); width: 100%;height: 100%;">
        <div class="card-group">
            <div class="card" style="margin-left: 20px;">
                <img src="add_patient.png" class="card-img-top" onClick="location.href='patient_details.html'"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title" onClick="location.href='patient_details.html'">ADD PATIENT</h5>
                </div>
            </div>
            <div class="card" style="margin-left: 20px;">
                <img src="history.png" class="card-img-top" onClick="location.href='search.php'" alt="...">
                <div class="card-body">
                    <h5 class="card-title" onClick="location.href='search.php'">SEARCH, EDIT, UPDATE & PATIENT REPORT </h5>
                </div>
            </div>
            <div class="card" style="margin-left: 20px;">
                <img src="report.jpg" class="card-img-top" onClick="location.href='history.php'" alt="...">
                <div class="card-body">
                    <h5 class="card-title" onClick="location.href='history.php'">PATIENT HISTORY</h5>
                </div>
            </div>
            <!-- <div class="card" style="margin-left: 20px;">
                <img src="search.png" class="card-img-top" onClick="location.href='report.php'" alt="...">
                <div class="card-body">
                    <h5 class="card-title" onClick="location.href='report.php'">PATIENT REPORTS</h5>
                </div>
            </div> -->
        </div>

        <!-- <p>Resize the browser window to see the effect.</p> -->


</body>

</html>
<?php

if ($_REQUEST['message_add'] == 'success') {
    echo '<script>alert("submitted data successfully")</script>';
    unset($_REQUEST['message_add']);
}
?>





















</body>

</html>