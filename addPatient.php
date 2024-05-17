<?php
include('connection.php');  

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$Student_ID =$_POST['SID'];
$Branch = $_POST['Branch'];
$Year = $_POST['Year'];
$CBC=$_POST['CBC'];
$KFT=$_POST['KFT'];
$LFT=$_POST['LFT'];
$CRP=$_POST['CRP'];
$BS=$_POST['BS'];


$sql = "INSERT INTO addPatient (firstname,lastname,gender,Student_ID,Branch,Year,CBC,KFT,LFT,CRP,BS) VALUES ('$firstname', 
'$lastname','$gender','$Student_ID','$Branch','$Year','$CBC','$KFT','$LFT','$CRP','$BS')";

if(mysqli_query($con, $sql)){
    header('Location: PatientDetails.html');
    exit;
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}



?>