<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applicants</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/UAS/CSS/viewApplicants.css">
    <link rel="stylesheet" href="/UAS/CSS/signup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
    session_start();
    $server_name="localhost";
    $username="root";
    $password="";
    $database_name="applicantinfo";

    $conn=mysqli_connect($server_name,$username,$password,$database_name);
    if(!$conn)
    {
        die("connection Failed:".mysqli_connect_error());
    }

    $sql_query = "SELECT * FROM userdata";
    $result=mysqli_query($conn,$sql_query) or die("Error !! Something went wrong");
    $sql_query1 = "SELECT * FROM courseselection";
    $result1=mysqli_query($conn,$sql_query1) or die("Error !! Something went wrong");

    if(mysqli_num_rows($result)>0)
    {
?>
<div class="row" id="logUp" style="background:white; color:black;">
    <div class="col-md-6"><h1 class="m-5 text-center"style="font-family:'Courier New';"><strong>APPLICANT DETAILS</strong></h1></div>
    <div class="col-md-4 m-5 text-center">
        <select name="CourseName">   
            <option value = "Select Course">Filter By Programme</option> 
            <option value = "Information Technology">B.Tech 4yrs, Information Technology</option> 
            <option value = "Electronics and Communication">B.Tech 4yrs, Electronics and Communication</option> 
            <option value = "Information Technology and Business Administration">B.Tech 4yrs, Information Technology and Business Administration</option> 
        </select>
    </div>
</div>
<div class="row"  style="width:100vw;">
<table id="students" class="mx-5">
    <thead>
        <th id="1">NAME</th>
        <th id="1">APPLICANT ID</th>
        <th id="1">COURSE APPLIED</th>
        <th id="1">ACTIONS</th>
    </thead>
    <tbody>
        <?php
            while($row=mysqli_fetch_assoc($result)){
                $row1=mysqli_fetch_assoc($result1)
        ?>
        <tr>
            <td><?php echo $row['Name'];?></td>
            <td id="$row['ID']"><?php echo $row['ID'];?></td>
            <td><?php echo $row1['CourseName'];?></td>
            <td>
                <div class="row">
                    <form class="form-horizontal" action="/UAS/PHP/macFunctions.php?id=<?php echo $row['ID'];?>" method="post">
                    <button class="btn btn-info m-2" name="details">DETAILS</button>
                        <button class="btn btn-success m-2" name="accept">ACCEPT</button>
                        <button class="btn btn-danger m-2" name="reject">REJECT</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
    </div>

<?php 
    }
    else{
        echo 'No applicants to show!!';
    }
?>

</body>
</html>