<?php // Ligação à bd

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Criar Conta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="fonts_reg/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="Registo/css_reg/style.css">
    <style>
        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .fechar {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .fechar:hover,
        .fechar:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

</head>

<body>

<div id="popupErro" class="popup">
    <span class="fechar" onclick="fecharPopupErro()">&times;</span>
    <p id="mensagemErro"></p>
</div>


<div class="wrapper" style="  background-image: url('Registo/images_reg/fundo.jpg');">
    <div class="inner">
        <div class="image-holder">
            <img src="Registo/images_reg/leathers-for-Shoes.jpg" alt="">
        </div>
        <form action="criarConta.php" method="post">
            <h3>Criar conta</h3>
            <div class="form-group">
                <input type="text" placeholder="Nome" class="form-control" name="nome" required>
                <input type="text" placeholder="Sobrenome" class="form-control" name="sobrenome" required>
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="Username" class="form-control" name="username" required>
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="E-mail" class="form-control" name="email" required>
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <select name="genero" id="" class="form-control" required>
                    <option value="" disabled selected>Género</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
                <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Password" class="form-control" name="password" required>
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Confirmar Password" class="form-control" name="confPassword" required>
                <i class="zmdi zmdi-lock"></i>
            </div>
            <button type="submit" name="botao" value="registar">Registar
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
            <div class="iniciarSess">
                <label for="">Já tem uma conta? <a href="login.php">Inicie Sessão</a></label>
            </div>
        </form>
    </div>
</div>

<div id="popupErro" class="popup">
    <span class="fechar" onclick="fecharPopupErro()">&times;</span>
    <p id="mensagemErro"></p>
</div>

<script>
    // Função para mostrar o popup de erro com a mensagem especificada
    function mostrarPopupErro(mensagem) {
        var popup = document.getElementById("popupErro");
        var mensagemErro = document.getElementById("mensagemErro");
        mensagemErro.innerHTML = mensagem;
        popup.style.display = "block";
    }

    // Função para fechar o popup de erro
    function fecharPopupErro() {
        var popup = document.getElementById("popupErro");
        popup.style.display = "none";
    }
</script>

</body>
</html>
<?php

//$conn -> close();

?>
