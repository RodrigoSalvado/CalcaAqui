<?php

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


    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $nomeCompleto = $nome . " " . $sobrenome;
    $username = $_POST["username"];
    $email = $_POST["email"];
    $genero = isset($_POST["genero"]) ? $_POST["genero"] : "outro";
    $password = $_POST["password"];
    $confPassword = $_POST["confPassword"];
    $registo = $_POST["botao"];

    if(isset($registo)){
        //testes
        echo $nomeCompleto . "<br>";
        echo "$username". "<br>";
        echo "$email". "<br>";
        echo "$genero" . "<br>";
        echo "$password". "<br>";
        echo "$confPassword". "<br>";

        $sql = "INSERT INTO conta (username, password, email, nome, genero) VALUES ('$username', '$password', '$email', '$nomeCompleto', '$genero')";
        $retval = mysqli_query($conn, $sql);
        if($retval == true){
            echo "dados inseridos com sucesso";

        }else{
            echo "erro";
        }




    }

$conn -> close();
?>