<?php                   //pagina Home 
session_start();
?>




<html>



    <head>
    <link rel="stylesheet" href="page.css"/>
    <script src="home.js" defer="true"></script>
    
        <title>
          Music Store
        </title>
    </head>
    <body>
    
    
    
    <nav>
    <a href="home.php">Home</a>
    <a href="nuove.php" class="nuove">Nuovi Album</a>
    <a href="page.php">Cerca musica</a>
    <a href="preferiti.php">Preferiti</a>
    <a href="logout.php">Logout</a>
  </nav>
        <img class="copertina" src="music.png" />
        
        <p class="testo">Benvenuto! <?php echo ($_SESSION["username"]);?> ♥</p>

        <p class="testo"> Ecco le ultime news sulla musica ♫ </p>

        <section id="library">
        </section>

        
    </body>
</html>
