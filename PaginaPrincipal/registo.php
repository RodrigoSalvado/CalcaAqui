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
<html>
<head>
    <meta charset="utf-8">
    <title>RegistrationForm_v1 by Colorlib</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="fonts_reg/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="Registo/css_reg/style.css">
</head>

<body>
<div class="wrapper" style="  background-image: url('Registo/images_reg/fundo.jpg');">
    <div class="inner">
        <div class="image-holder">
            <img src="Registo/images_reg/leathers-for-Shoes.jpg" alt="">
        </div>
        <form action="">
            <h3>Criar conta</h3>
            <div class="form-group">
                <input type="text" placeholder="Nome" class="form-control">
                <input type="text" placeholder="Sobrenome" class="form-control">
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="Username" class="form-control">
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="E-mail" class="form-control">
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <select name="" id="" class="form-control">
                    <option value="" disabled selected>Genero</option>
                    <option value="male">Masculino</option>
                    <option value="femal">Feminino</option>
                    <option value="other">Outro</option>
                </select>
                <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Password" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Confirm Password" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <button>Registar
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
            <div class="iniciarSess">
                <label for="">Já tem uma conta? <a href="login.php">Inicie Sessão</a></label>
            </div>
        </form>
    </div>
</div>

</body>
</html>
<?php



$conn -> close();
