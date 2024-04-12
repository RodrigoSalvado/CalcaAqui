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
    <title>Document</title>
    <link rel="stylesheet" href="login/style-login.css">
</head>

<div class="login">

    <div class="photo">
    </div>
    <span>Introduza os seus dados de Login</span>
    <form action="" id="login-form">
        <div id="u" class="form-group">
            <input id="username" spellcheck=false class="form-control" name="username" type="text" size="18" alt="login" required="">
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="username" class="float-label">Email</label>
            <erroru>
                Username is required
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                </i>
            </erroru>
        </div>
        <div id="p" class="form-group">
            <input id="password" class="form-control" spellcheck=false name="password" type="password" size="18" alt="login" required="">
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="password" class="float-label">Password</label>
            <errorp>
                Password is required
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                </i>
            </errorp>
        </div>
        <div class="form-group">
            <input type="checkbox" id="rem">
            <label for="rem">Manter sessão iniciada</label>
            <button id="submit" type="submit" ripple>Iniciar sessão</button>
        </div>
    </form>
    <footer><a href="registo.php">Não tem uma conta? Crie uma!</a></footer>
</div>



</body>
</html>
<?php



$conn -> close();
