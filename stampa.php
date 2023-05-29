<?php



session_start();
   $conn = mysqli_connect("localhost", "root", "", "musica") or die(mysqli_error($conn));
   $nome =$_SESSION['username'];
   $query = "SELECT a.autore, a.titolo, a.contenuto, a.img from articoli a join likes l where a.titolo=l.titolo and l.username='$nome'";
  
   $res = mysqli_query($conn, $query);
   

    $risultati= [];
    while($row = mysqli_fetch_assoc($res)){
      $risultati[]=$row;
    }
    echo json_encode($risultati);

?>