<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "musica");

$autore =mysqli_real_escape_string($conn, $_GET["autore"]);
$titolo = mysqli_real_escape_string($conn,$_GET["titolo"]);
$descrizione = mysqli_real_escape_string($conn,$_GET["descrizione"]);
$immagine =mysqli_real_escape_string($conn, $_GET["immagine"]);




$query = "INSERT INTO articoli VALUES('$autore','$titolo','$descrizione','$immagine')";
$res = mysqli_query($conn, $query);
$nome = $_SESSION['username'];
$query2="INSERT INTO likes VALUES('$nome','$titolo')";
$res1 = mysqli_query($conn,$query2);

mysqli_close($conn);
?>

