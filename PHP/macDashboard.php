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
</head>

<body>
    <div class="container-fluid" style="background-color: rgb(216, 213, 213);">
        <div class="row">
            <div class="col-md-9">
                <div class="row justify-content-around text-center my-5">
                    <div class="col-lg-5 col-sm-6 p-3" style="background-color:white;border-radius:40px;border:2px solid black;">
                        <h3>Welcome : <strong> <?php echo $_SESSION['name']?></strong></h3>
                    </div>
                    <div class="col-lg-5 col-sm-6 p-3" style="background-color:white;border-radius:40px;border:2px solid black;">
                        <h3>MAC ID : <strong><?php echo $_SESSION['ID']?></strong></h3>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="col">
                        <form class="form-horizontal" action="macFunctions.php" method="POST">
                            <div class="row justify-content-start">
                                <div class="col-2 text-center">
                                    <button class="btn btn-primary" name="profile">PROFILE</button>
                                </div>
                                <div class="col-2 text-center">
                                    <button class="btn btn-primary" name="applicant">APPLICANT</button>
                                </div>
                                <div class="col-2 text-center">
                                    <button class="btn btn-primary" name="logout">LOGOUT</button>
                                </div>
                            </div>
                        </form>
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
            </div>
        </div>
    </div>
</body>

</html>