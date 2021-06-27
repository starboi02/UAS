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

if(isset($_POST['accepted']))
{
    echo '<script>window.location.href="/UAS/PHP/accepted.php";</script>';
}

if(isset($_POST['confirmed']))
{
    echo '<script>window.location.href="/UAS/PHP/confirmed.php";</script>';
}

if(isset($_POST['rejected']))
{
    echo '<script>window.location.href="/UAS/PHP/rejected.php";</script>';
}

if(isset($_POST['waiting']))
{
    echo '<script>window.location.href="/UAS/PHP/waiting.php";</script>';
}

if(isset($_POST['programmes']))
{
    echo '<script>window.location.href="/UAS/PHP/programmes.php";</script>';
}

if(isset($_POST['insert']))
{
    $CourseID=$_POST['courseid'];
    $CourseName=$_POST['coursename'];
    $CourseCredits=$_POST['coursecredits'];
    $StartDate=$_POST['startdate'];
    $CourseDuration=$_POST['courseduration'];
    $Degree=$_POST['degree'];
    $sql_query = "INSERT INTO course VALUES('$CourseID','$CourseName','$CourseCredits','$StartDate','$CourseDuration','$Degree')";
    $result=mysqli_query($conn,$sql_query) or die("Error !! Something went wrong");
    echo '<script>window.location.href="/UAS/PHP/programmes.php";</script>';
}

if(isset($_POST['delete']))
{
    $courseID=$_POST['courseid'];
    $sql_query = "DELETE FROM course WHERE CourseID='$courseID'";
    $result=mysqli_query($conn,$sql_query) or die("Error !! Something went wrong");
    echo '<script>window.location.href="/UAS/PHP/programmes.php";</script>';
}

if(isset($_POST['schedule']))
{
    $courseID=$_POST['courseid'];
    $newDate=$_POST['newdate'];
    $sql_query = "UPDATE course SET StartDate='$newDate' WHERE CourseID='$courseID'";
    $result=mysqli_query($conn,$sql_query) or die("Error !! Something went wrong");
    echo '<script>window.location.href="/UAS/PHP/programmes.php";</script>';
}

if(isset($_POST['logout']))
{
    echo '<script>window.location.href="/UAS/index.html";</script>';
}

if(isset($_POST['viewByDate']))
{
    session_start();
    $_SESSION['dateVal']=$_POST['newdate'];
    echo '<script>window.location.href="/UAS/PHP/sortByDate.php";</script>';
}

?>