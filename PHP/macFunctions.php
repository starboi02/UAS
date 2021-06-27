<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applicants</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/UAS/CSS/viewApplicants.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<?php

$server_name="localhost";
$username="root";
$password="";
$database_name="applicantinfo";
$conn=mysqli_connect($server_name,$username,$password,$database_name);


if(!$conn)
{
    die("connection Failed:".mysqli_connect_error());
}

if(isset($_POST['applicant']))
{
    echo '<script>window.location.href="/UAS/PHP/viewApplicants.php";</script>';
}

if(isset($_POST['logout']))
{
    echo '<script>window.location.href="/UAS/index.html";</script>';

}


if(isset($_POST['details']))
{
    $IDHere = $_GET['id'];
    $sql_query = "SELECT * FROM userdata WHERE ID='$IDHere'";
    $result = mysqli_query($conn,$sql_query) or die("Error !! Something went wrong");
    $sql_query1 = "SELECT * FROM courseselection WHERE ApplicationID='$IDHere'";
    $result1 = mysqli_query($conn,$sql_query1) or die("Error !! Something went wrong");

    $row = mysqli_fetch_assoc($result);
    $row1 = mysqli_fetch_assoc($result1);
    ?>
        <h1 class="m-5" style="font-family:'Courier New';"><strong>APPLICATION ID: <?php echo $row['ID'];?></strong></h1>
        <div class="row justify-content-around mx-5" style="width:100vw;">
            <div class="col">
                <table id="students" class="mx-5" style="width:50%;">
                    <tbody>
                        <th>Parameter</th>
                        <th>Details</th>
                        <tr><td>Name : </td><td><?php echo $row['Name'];?></td></tr>
                        <tr><td>Age: </td><td><?php echo $row['Age'];?></td></tr>
                        <tr><td>Gender : </td><td><?php echo $row['Gender'];?></td></tr>
                        <tr><td>Class 10 Aggregate : </td><td><?php echo $row['Class10%'];?></td></tr>
                        <tr><td>Class 12 Aggregate : </td><td><?php echo $row['Class12%'];?></td></tr>
                        <tr><td>Adderess : </td><td><?php echo $row['Address'];?></td></tr>
                        <tr><td>Email : </td><td><?php echo $row['Email'];?></td></tr>
                        <tr><td>Course Applied : </td><td><?php echo $row1['CourseName'];?></td></tr>
                        <tr><td>Date of Birth : </td><td><?php echo $row['DoB'];?></td></tr>
                        <tr><td>Application Status : </td><td><?php echo $row['Status'];?></td></tr>
                    </tbody>
                </table>
            </div>
        </div>

    <?php
}

if(isset($_POST['accept']))
{   
    $IDHere=$_GET['id'];

    $sql_query = "UPDATE userdata SET Status='Accepted' WHERE ID='$IDHere'";
    $sql_query1 = "SELECT Email,Name FROM userdata WHERE ID='$IDHere'";
    $result = mysqli_query($conn,$sql_query) or die("Error !! Something went wrong");
    $result1 = mysqli_query($conn,$sql_query1) or die("Error !! Something went wrong");
    $row = mysqli_fetch_assoc($result1);
    $name=$row['Name'];

    $toemail = $row['Email'];
    $from = 'sonkerankush123@gmail.com'; 
    $fromName = 'IIITA Admissions'; 
    $subject = "Acception of Form- Regarding.";
    $body = "Hello $name, \n\nWe are please to informed that your application has been shortlisted for the admission to our programme. For more information like Interview Calling Date etc, visit the admission portal and check into your account.\n\nNote: This is a system generated mail. So do not revert back to it.\n\nRegards,\nAdmission Committee, IIITA\n ";
    $headers = "From: sonkerankush123@gmail.com";
    mail($toemail, $subject, $body, $headers);

    echo '<script>window.location.href="/UAS/PHP/viewApplicants.php";</script>';

}

if(isset($_POST['reject']))
{

    $IDHere=$_GET['id'];
    $sql_query = "UPDATE userdata SET Status='Rejected' WHERE ID='$IDHere'";
    $sql_query1 = "SELECT Email,Name FROM userdata WHERE ID='$IDHere'";
    $result=mysqli_query($conn,$sql_query) or die("Error !! Something went wrong");
    $result1 = mysqli_query($conn,$sql_query1) or die("Error !! Something went wrong");
    $row = mysqli_fetch_assoc($result1);

    $name=$row['Name'];
    $toemail = $row['Email'];
    $from = 'sonkerankush123@gmail.com'; 
    $fromName = 'IIITA Admissions'; 
    $subject = "Rejection of Form- Regarding.";
    $body = "Hello $name, \n\nWe regret to inform that your application has been rejected by the admission committee for our programme. We wish you a bright future ahead.Apologies for your rejection.\n\nNote: This is a system generated mail. So do not revert back to it.\n\nRegards,\nAdmission Committee, IIITA\n ";
    $headers = "From: sonkerankush123@gmail.com";
    mail($toemail, $subject, $body, $headers);

    echo '<script>window.location.href="/UAS/PHP/viewApplicants.php";</script>';
}

?>