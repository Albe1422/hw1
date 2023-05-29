<?php

// pagina creazione account 

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["nome"]) && 
       !empty($_POST["cognome"]) && !empty($_POST["confirm_password"]))
    {
        $error = array();
        $conn = mysqli_connect("localhost", "root", "", "musica");
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM users WHERE username = '".$_POST['username']."'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $query = "SELECT * FROM USERS WHERE EMAIL = '".$_POST['email']."'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if (count($error) == 0){
        $query = "INSERT INTO users VALUES('$nome','$cognome','$username','$email','$password')";
    
            if (mysqli_query($conn, $query)) {
            mysqli_close($conn);
            header("Location: login.php");
            exit;
            }
    }

    }
    else {
        $error[] = "Riempi tutti i campi*";
    }
?>


<html>
    <link rel="stylesheet" href="login.css"/>
    <script src="create.js" defer="true"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <body>
    <div class='sfondo'>
        <main>
            <div class="row">
                
                <div class="colm-form">
                    <form class="form-container" method='post'>
                        <p class="titolo"><h2>Music Store</h2> </p>
                        <?php
                        foreach($error as $e){
                            echo $e ."\n";
                        }
                        ?>
                        <div class="nome">
                        <input type="text" id="nome" name="nome" placeholder="Nome*" onkeyup="validazione_nome()"> 
                        <span id="errore_nome"></span>
                        </div> 
                        <div class="cognome">
                        <input type="text" id="cognome" name="cognome"  placeholder="Cognome*" onkeyup="validazione_cognome()">  
                        <span id="errore_cognome"></span>
                        </div> 
                        <div class="username">
                        <input type="text" id="username" name="username" placeholder="Username*" onkeyup="validazione_username()"> 
                        <span id="errore_username"></span>
                        </div> 
                        <div class="email">
                        <input type="email" id="email" name="email" placeholder="Email*" onkeyup="validazione_email()">  
                        <span id="errore_email"></span>
                        </div> 
                        <div class="password">
                        <input type="password" id="password" name="password" placeholder="Password*" onkeyup="validazione_password()">  
                        <span id="errore_password"></span>
                        </div>  
                        <div class="confirm_password">
                        <input type="password" name="confirm_password" placeholder="Conferma Password*">  
                        </div>  

                        
                      
                        <input type="submit" class="btn-login" value="Sign Up"/>
                    </form>    
                </div>
            </div>
        </main>
    </div>
    </body>
    </html>