<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "schooldata";
$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    echo json_encode("sorry, database connection failed");
}
$sql  = "select * from students";
$result = mysqli_query($conn, $sql);
$students = [];
while (($row = mysqli_fetch_assoc($result))) {
     $user = [
         "id" => $row["id"],
         "firstName" => $row["firstName"],
         "lastName" => $row["lastName"],
         "finalExam" => $row["finalExam"]
     ];
     
     array_push($students, $user );
}

echo json_encode($students);
?>