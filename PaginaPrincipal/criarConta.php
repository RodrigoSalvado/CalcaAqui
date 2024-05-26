<?php
    /*$servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);
    mysqli_select_db($conn , 'CalcaAqui');

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }else{
        echo "Entrou na bd <hr>";*/

// Ligação à bd
include("../basedados/db.h");
global $conn;


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

        if(isset($nome, $sobrenome, $username, $email, $genero, $password, $confPassword)){

            if($password != $confPassword){
                echo "<script>window.alert('As passwords não coincidem!') ; window.location.href = 'login.php';</script>";
               // echo "As passwords nao conincidem";
            }else{
                //encriptacao da password
                $passwordEncriptada = md5($password);

                $sqlSelect = "SELECT id_utilizador FROM conta WHERE email = '$email' OR username = '$username' ";
                $resultSelect = mysqli_query($conn, $sqlSelect);

                if($resultSelect->num_rows > 0){
                    echo "<script>window.alert('Este username ou mail já esta em uso!') ;</script>";
                }else{
                    $sqlInsert = "INSERT INTO conta (username, password, email, nome, genero) VALUES ('$username', '$passwordEncriptada', '$email', '$nomeCompleto', '$genero')";
                    $resultInsert = mysqli_query($conn, $sqlInsert);
                    if($resultInsert == true){
                        echo "A sua conta foi criada com sucesso!";
                        header("Location: login.php");

                    }else{
                        echo "<script>window.alert('Não foi possivel criar a conta! Tente novamente.') ; window.location.href = 'login.php';</script>";
                    }
                }
            }
        }

    }

    $conn -> close();
?>