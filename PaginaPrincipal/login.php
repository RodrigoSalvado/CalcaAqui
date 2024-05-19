
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
    <form action="confirmarLogin.php" id="login-form" method="post">
        <div id="u" class="form-group">
            <input id="username" spellcheck=false class="form-control" name="username" type="text" size="18" alt="login" required="">
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="username" class="float-label">Username</label>
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
            <a href="email.php" id="pass">Esqueceu-se da palavra-passe?</a>
            <button id="submit" type="submit" name="botao" ripple>Iniciar sessão</button>
        </div>
    </form>
    <footer><a href="registo.php">Não tem uma conta? Crie uma!</a></footer>
</div>

</body>
</html>


<?php

/*if(isset($_POST["username"]) && isset($_POST["password"])){
	
	//Dados do formulário
	$username = $_POST["user"];
	$password = $_POST["pass"];
	include './basedados/db.h';

    $sql = "SELECT * FROM conta WHERE username = '$username' AND pass = '".md5($password);
	$retval = mysqli_query( $conn, $sql );
	if(! $retval ){
		die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
	}
	$row = mysqli_fetch_array($retval);

    if(strcmp($row["user"], $username) == 0 && strcmp($row["pass"], md5($password)) == 0){
		
		$_SESSION["user"] = $row["username"];
	}else{
		$_SESSION["user"] = -1;
	}
}	
else{

	header("refresh:0;url = ./PaginaPrincipal.html");
}
*/

   // $conn -> close();
?>

