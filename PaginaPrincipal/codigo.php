<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login/style-login.css"/>
    <style>
        /* Adicione este estilo para posicionar as caixas de texto */
        .form-group {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .form-group input {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>

<div class="login">

    <div class="photo">
    </div>
    <span>Código de Recuperação:</span>
    <form action="" method="post">
        <label>Insira o código:</label>
        <div class="form-group">
            <input id="codigo1" spellcheck=false class="form-control" name="codigo1" type="text" size="1" alt="login" maxlength="1" required="">
            <input id="codigo2" spellcheck=false class="form-control" name="codigo2" type="text" size="1" alt="login" maxlength="1" required="">
            <input id="codigo3" spellcheck=false class="form-control" name="codigo3" type="text" size="1" alt="login" maxlength="1" required="">
            <input id="codigo4" spellcheck=false class="form-control" name="codigo4" type="text" size="1" alt="login" maxlength="1" required="">
            <input id="codigo5" spellcheck=false class="form-control" name="codigo5" type="text" size="1" alt="login" maxlength="1" required="">
            <input id="codigo6" spellcheck=false class="form-control" name="codigo6" type="text" size="1" alt="login" maxlength="1" required="">
        </div>
        <div class = botao>
            <button id="submit" type="submit" name="botao" ripple>Enviar</button>
        </div>

    </form>
    <footer><a href="codigo.php">Não recebeu o código? Enviar outro código!</a></footer>
</div>
<script>
    const inputs = document.querySelectorAll('.form-group input');

    inputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            if (e.target.value.length === 1) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && index > 0 && !input.value) {
                inputs[index - 1].focus();
            }
        });
    });
</script>
</body>
</html>


<?php
$codigo_aleatorio = sprintf("%06d", mt_rand(0, 999999));

session_start();
$_SESSION['codigo_recuperacao'] = $codigo_aleatorio;
?>

