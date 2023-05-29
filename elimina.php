<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "musica");


$titolo = mysqli_real_escape_string($conn,$_GET["titolo"]);

$nome = $_SESSION['username'];
$query="DELETE FROM likes WHERE username='$nome' and titolo='$titolo'";
$res1 = mysqli_query($conn,$query);

mysqli_close($conn);
?>

