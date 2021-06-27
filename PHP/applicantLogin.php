<?php

if(isset($_POST['applicantLogin']))
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

    $applyID = $_POST['applyID'];
    $password = $_POST['password'];
    session_start();

    $sql_query = "SELECT * FROM userdata WHERE ID='$applyID' AND password='$password'";


    if($result = mysqli_query($conn,$sql_query))
    {
        $row = mysqli_fetch_assoc($result);
        if($row && $row['ID']==$applyID && $row['Password']==$password){
            $_SESSION['name'] = $row['Name'];
            $_SESSION['age'] = $row['Age'];
            $_SESSION['gender'] = $row['Gender'];
            $_SESSION['address'] = $row['Address'];
            $_SESSION['class10'] = $row['Class10%'];
            $_SESSION['class12'] = $row['Class12%'];
            $_SESSION['email']=$row['Email'];
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['dob']=$row['DoB'];
            $_SESSION['status']=$row['Status'];

            $_SESSION['color'];
            if($_SESSION['status']=='Waiting'){
                $_SESSION['color']="rgb(10, 60, 223)";
            }
            else if($_SESSION['status']=='Accepted'|| $_SESSION['status']=='Confirmed'){
                $_SESSION['color']="rgb(32, 173, 39)";
            }
            else if($_SESSION['status']=='Rejected'){
                $_SESSION['color']="rgb(231, 15, 15)";
            }
            
            echo '<script>window.location.href="/UAS/PHP/applicantDashboard.php";</script>';
        }
        else{
            echo 'Invalid User Credentials';
        }
    }
    else
    {
        echo "Error: ". $sql ."" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>