<?php

if(isset($_POST['apply']))
{
    $server_name="localhost";
    $username="root";
    $password="";
    $database_name="applicantinfo";

    $conn=mysqli_connect($server_name,$username,$password,$database_name);
    if(!$conn)
    {
        die("connection Failed:".mysqli_connect_error());
    }

    $sql_query0="SELECT * FROM userdata";
    $result=mysqli_query($conn,$sql_query0) or die("Error !! Something went wrong");
    $cnt=0;

    while($row=mysqli_fetch_assoc($result))
    {
        $cnt++;
    }

    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $Address = $_POST['Address'];
    $Class10 = $_POST['Percent10'];
    $Class12 = $_POST['Percent12'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $DoB = $_POST['DoB'];
    $status="Waiting";
    $CourseName = $_POST['CourseName'];
    $ID=123456789+$cnt;

    $sql_query = "INSERT INTO userdata VALUES('$Name','$Age','$Gender','$Address','$Class10','$Class12','$Email','$ID','$Password','$DoB','$status')";
    $sql_query1 = "INSERT INTO courseselection VALUES('$ID','$CourseName')";


    if(mysqli_query($conn,$sql_query) && mysqli_query($conn,$sql_query1))
    {
        echo '<script>alert("Registration Completed Successfully. Email sent to your mail box")</script>';
        $toemail = "$Email";
        $subject = "Registration Completed Successfully-Regarding";
        $body = "Hey $Name, \n\nWe just noticed your registration in our course via IIITA Admission Portal. We warmly welcome you to the IIITA Family. We hope you are fine and wish you a healthy life. You can check your application form status online on our website. \n\nApplication ID: $ID\nApplicant Name: $Name\nCourse Applied: $CourseName\n\nNote: This is a system generated mail. So do not revert back to it.\n\nRegards,\nAdmission Committee, IIITA\n ";
        $headers = "From: sonkerankush123@gmail.com";
        mail($toemail, $subject, $body, $headers);

        echo '<script>window.location.href="/UAS/HTML/signup.html";</script>';
    }

    else
    {
        echo "Error: ". $sql ."" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>