<?php
$servername="localhost:3306/";
$username="root";
$password="HelloAdmin23";
$dbname="unifun_project";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connection failed: ".$conn->connect_error);
}
echo "Connected successfully";

?>