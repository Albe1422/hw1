<?php            //pagina di login 

    session_start();
    if(isset($_SESSION["username"]))
    {
        header("Location: home.php");
        exit;
    }
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "musica");
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $query = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res) > 0)
        {
            $_SESSION["username"] = $_POST["username"];
            header("Location: home.php");
            exit;
        }
        else
        {
            $errore = true;
        }
    }


?>

<html>
    <link rel="stylesheet" href="login.css"/>
    <script src="login.js" defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
  if (isset($error)) {
    echo "<span class='error'>$error</span>";
}
    ?>
   
    <body>
        <div class='sfondo'>
        <main>
        <?php  if (isset($error)) {echo "<span class='error'>$error</span>";}?>
            <form class="row" name="login" method='post'>
                
                <div class="colm-form">
                    <div class="form-container">
                    <p><h2>Music Store</h2> </p>
                    <div class="username">
                        <label for="username"></label>
                        <input type="text" name="username" placeholder="Username" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                        </div>
                        <div class="password">
                            <label for="Password"></label>
                        <input type="password" name="password" placeholder="Password" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                        </div>
                    
                        <input type="submit" class="btn-login" value="Login"/>
                        <p class="scritta">Se non hai un account, <a href="create.php">registrati</a> </p>

                        
            </form>
        </main>
        </div >
        <footer>
            <p class="scritta_footer"> Realizzato da Alberto Calabrese matricola: 1000014688 </p>
        </footer>

    </body>
    </html>