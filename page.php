<?php        //questa è la pagina di ricerca dell'album 
?>
<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="page.css"/>
    <script src="page.js" defer="true"></script>
    
        <title>
          Music Store
        </title>
    </head>
    <body>
    
    
    
    <nav>
    <a href="home.php">Home</a>
    <a href="nuove.php" class="nuove">Nuovi Album</a>
    <a href="page.php">Cerca Musica</a>
    <a href="preferiti.php">Preferiti</a>
    <a href="logout.php">Logout</a>
  </nav>
        <img class="copertina" src="music.png" />
        


   <form id="due">
      <input type='text' id='album' placeholder='Nome Album'>
      <input type='submit' id='submit' value='Cerca'>
    </form>

    <section id="album-view">
   
    </section>
    
    </body>
</html>
