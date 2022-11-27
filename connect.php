<?php 
$server = "MAY10";
$user = "root";
$pass = "013579";
$database = "MHouse";

$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    die("<script>alert('Failed to connect to database!!!')</script>");
    exit();    
}
?>