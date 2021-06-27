<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmed Applicants</title>
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

    $sql_query = "SELECT * FROM userdata WHERE Status='Confirmed'";
    $result=mysqli_query($conn,$sql_query) or die("Error !! Something went wrong");

    if(mysqli_num_rows($result)>0)
    {
?>
<div class="row" id="logUp" style="background:white; color:black;">
    <div class="col-6"><h1 class="m-5 text-center"style="font-family:'Courier New';"><strong> CONFIRMED APPLICANT DETAILS</strong></h1></div>
</div>
<div class="row"  style="width:100vw;">
<table id="students" class="mx-5">
    <thead>
        <th id="1">NAME</th>
        <th id="1">APPLICANT ID</th>
        <th id="1">GENDER</th>
        <th id="1">AGE</th>
        <th id="1">EMAIL</th>
        <th id="1">COURSE</th>
    </thead>
    <tbody>
        <?php
            while($row=mysqli_fetch_assoc($result)){
                $idd=$row['ID'];
                $sql_query1 = "SELECT * FROM courseselection WHERE ApplicationID='$idd'";
                $result1=mysqli_query($conn,$sql_query1) or die("Error !! Something went wrong");
                $row1=mysqli_fetch_assoc($result1)
        ?>
        <tr>
            <td><?php echo $row['Name'];?></td>
            <td id="$row['ID']"><?php echo $row['ID'];?></td>
            <td><?php echo $row['Gender'];?></td>
            <td><?php echo $row['Age'];?></td>
            <td><?php echo $row['Email'];?></td>
            <td><?php echo $row1['CourseName'];?></td>
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