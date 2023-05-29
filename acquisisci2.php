<?php   
session_start();

$conn = mysqli_connect("localhost", "root", "", "musica");
$titolo =mysqli_real_escape_string($conn,$_GET["titolo"]);
$immagine =mysqli_real_escape_string($conn, $_GET["immagine"]);



$query = "INSERT INTO articoli VALUES('','$titolo','','$immagine')";
$res = mysqli_query($conn, $query);
$nome = $_SESSION['username'];
$query2="INSERT INTO likes VALUES('$nome','$titolo')";
$res1 = mysqli_query($conn,$query2);


mysqli_close($conn);
?>

