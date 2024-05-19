

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Recuperação</title>
    <link rel="stylesheet" href="login/style-login.css"/>

</head>

<div class="login">

    <div class="photo">
    </div>
    <span>Insira o seu Email:</span>
    <form action="codigo.php" method="post">
        <div id="u" class="form-group">
            <input id="email" spellcheck=false class="form-control" name="email" type="text" size="30" alt="login" required="">
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="mail" class="float-label">Insira o mail!</label>
            <erroru>
                Email is required
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24h-24z" fill="none"/>
                        <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                    </svg>
                </i>
            </erroru>
        </div>
        <div class = botao3>
            <button id="submit" type="submit" name="botao" ripple>Confirmar</button>
        </div>

    </form>

</div>
</body>
</html>
