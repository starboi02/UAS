<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/UAS/CSS/applicantDashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid" style="background-color: rgb(216, 213, 213);">
        <div class="row">
            <div class="col-md-9">
                <div class="row text-right my-3 mr-2">
                    <div class="col">
                        <h3>Welcome <?php echo $_SESSION['name']?></h3>
                    </div>
                </div>
                <div class="row justify-content-around text-center my-5">
                    <div class="col-lg-4 col-sm-6 p-3">
                        <form class="form-horizontal" action="pdf.php" method="POST">
                            <button class="btn btn-primary mx-2" name="download" id="download">DOWNLOAD</button>
                            <button class="btn btn-primary" id="email" name="emailForm">EMAIL PDF</button>
                        </form>
                    </div>
                    <div class="col-lg-2 m-3">
                        <button class="btn btn-primary mx-2" data-target="#mymodel2" data-toggle="modal">VIEW STATUS</button>
                            <div class="modal" id="mymodel2">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="background: linear-gradient(rgba(210, 255, 225, 0.97), rgba(210, 255, 225, 0.97));color:firebrick;">
                                        <div class="modal-header">
                                            <h2>Application Status</h2>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" action="PHP/macLogin.php" method="post">
                                                <div class="form-group">
                                                    <h3 style="font-weight:bold;color:firebrick">Your Application Status: <?php echo $_SESSION['status']?></h3>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 p-3" style="background-color:white;border-radius:40px;border:2px solid black;">
                        <h3>Application ID : <strong><?php echo $_SESSION['ID']?></strong></h3>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <h3 style="font-weight:600;" class="text-center mt-3 pb-2">APPLICANT CREDENTIALS</h3>
                </div>
                <div class="row justify-content-around mx-3 mb-5" id="formDetails">
                    <div class="col-12 mx-3 py-3">
                        <div class="row justify-content-around">
                            <div class="col-md-4" id="op1">
                                <strong>Name : <?php echo $_SESSION['name']?></strong></a>
                            </div>
                            <div class="col-md-4" id="op1">
                                <strong>Age(in yrs) : <?php echo $_SESSION['age']?></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mx-3 py-3">
                        <div class="row justify-content-around">
                            <div class="col-md-4" id="op1">
                                <strong>Gender : <?php echo $_SESSION['gender']?></strong></a>
                            </div>
                            <div class="col-md-4" id="op1">
                                <strong>Address : <?php echo $_SESSION['address']?></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mx-3 py-3">
                        <div class="row justify-content-around">
                            <div class="col-md-4" id="op1">
                                <strong>Class 10 % :  <?php echo $_SESSION['class10']?></strong></a>
                            </div>
                            <div class="col-md-4" id="op1">
                                <strong>Class 12 % : <?php echo $_SESSION['class12']?></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mx-3 py-3">
                        <div class="row justify-content-around">
                            <div class="col-md-4" id="op1">
                                <strong>Date of Birth : <?php echo $_SESSION['dob']?></strong></a>
                            </div>
                            <div class="col-md-4" id="op1">
                                <strong>Email ID : <?php echo $_SESSION['email']?></strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="background-color:white;">
                <div class="row justify-content-around my-5" style="height:150px;" id="iconSection">
                    <img src="/UAS/Images/Index Page/Image2.png" alt="">
                </div>
                <div class="row justify-content-around mt-5 mb-5">
                    <h5><strong>Welcome  <?php echo $_SESSION['name']?></strong></h5>
                </div>
                <div class="row justify-content-around mx-3 py-2 mb-5" id="menu">
                    <div id="op1" class=" mb-3 pb-2">
                        <em class="fa fa-home pr-3"></em><a href="applicantDashboard.php"><strong>Home</strong></a>
                    </div>
                    <div id="op1" class=" mb-3 pb-2">
                        <em class="fa fa-user pr-3"></em><a href="applicantDashboard.php"><strong>Profile</strong></a>
                    </div>
                    <div id="op1" class=" mb-3 pb-2">
                        <em class="fa fa-book pr-3"></em><a href="index.html"><strong>Courses</strong></a>
                    </div>
                    <div id="op1" class=" mb-3 pb-2">
                        <em class="fa fa-sign-out pr-3"></em><a href="/UAS/index.html"><strong>Logout</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>