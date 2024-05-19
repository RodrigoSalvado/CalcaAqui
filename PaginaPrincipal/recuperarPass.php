<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar a palavra-passe</title>
    <link rel="stylesheet" href="login/style-login.css"/>

</head>

<div class="login">

    <div class="photo">
    </div>
    <span>Recuperar a palavra passe:</span>
    <form action="" method="post">
        <div id="u" class="form-group">
            <input id="pass" spellcheck=false class="form-control" name="pass" type="text" size="18" alt="login" required="">
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="pass" class="float-label">Nova palavra-passe!</label>
            <erroru>
               Nova pass is required
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                </i>
            </erroru>
        </div>
        <div id="p" class="form-group">
            <input id="pass" spellcheck=false class="form-control" name="confirmar_pass" type="text" size="18" alt="login" required="">
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="confirmar_pass" class="float-label">Confirmar nova palavra-passe!</label>
            <erroru>
                Nova pass is required
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                </i>
            </erroru>
        </div>
            <div class = botao2>
            <button id="submit" type="submit" name="botao" ripple>Confirmar</button>
            </div>

    </form>
    <footer><a href="login.php">Já tem uma conta? Inicie Sessão!</a></footer>
</div>

</body>
</html>


<?php
global$conn;
session_start();
include("../basedados/db.h");

if(isset($_POST["botao"])){
    try{
        $nova_pass = $_POST["pass"];
        $confirmar_pass = $_POST["confirmar_pass"];
    }catch(Exception $e){

    }


    if (strcmp($nova_pass, $confirmar_pass) == 0) {
        $email = $_SESSION["email"];
        $nova_pass = md5($nova_pass);

        $sql = "UPDATE conta SET password = '$nova_pass' WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        session_destroy();
        echo "<script>window.alert('Password Alterada!') ; window.location.href = 'login.php';</script>";

    } else {
        echo "<script>alert('Passwords não combinam!')</script>";
    }

}
?>
