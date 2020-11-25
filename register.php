<?php
$student = json_decode(file_get_contents("php://input"));
$username = "root";
$password = "";
$server = "localhost";
$database = "schooldata";
$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    echo json_encode("sorry, database connection failed");
}

$firstName = $student->firstName;
$lastName = $student->lastName;
$finalExam = $student->finalExam;

$sql = "insert into students (firstName, lastName, finalExam) values ('$firstName', '$lastName',$finalExam) ";
if(mysqli_query($conn, $sql)){
    echo json_encode("you have registered");
}
else{
    echo json_encode("sorry, we couldn't create a data");
}
mysqli_close($conn);
?>