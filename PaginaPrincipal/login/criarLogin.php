<?php // Ligação à bd
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn , 'CalcaAqui');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}else{
    echo "Entrou na bd <hr>";
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CalçaAqui</title>
    
</head>
<body class="fundo">
    <section>
        <div class="janela-inicio-sessao">
            <div class="dados-inicio-sessao">
                <form action="" method="post">
                    <h2>Iniciar sessão:</h2>
                    <div class="inputbox">
                        <label for="">Nome de utilizador ou email</label>
                        <input name="mail" type="text" placeholder="">
                        <ion-icon name="person-outline"></ion-icon>


                    </div>

                    <div class="inputbox">
                        <label for="">Palavra-passe</label>
                        <input name="password" type="password">
                        <ion-icon name="lock-closed-outline"></ion-icon>

                    </div>
                    <div class="lembrar-dados">
                        <label for=""><input type="checkbox" name="" id="">Manter sessão iniciada</label>
                    </div>
                    <div class="esquecer-pass">
                        <a href="#">Esqueceu-se da Palavra-passe?</a>
                    </div>

                    <div class="inputbox">
                        <button name="login"><a href="CodigoRecuperacao.html">Iniciar sessão</a></button>
                    </div>

                    <div class="criar-conta">
                        <p>Não tem uma conta? <a href="criarConta.html">Crie uma!</a></p><br>
                    </div>

                </form>
            </div>
        </div>
    </section>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php

//$sql = "SELECT FROM users(user,password) VALUES ($mail, $password)";

if(isset($_POST["login"])){

    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);
   

    if(empty($mail)){
        echo"Nome de utilizador ou email não preenchido!";
    }
    elseif(empty($password)){
        echo"password não preenchido!";
    }
    else{
        $sql = "SELECT Id, password FROM users WHERE user = ?";
    }
    
    if(password_verify($password, $hashed_password)) {
        echo "Login bem-sucedido! ";
    
        echo "Nome de usuário/email ou senha incorreta.";
    }
}


$conn -> close();

?>