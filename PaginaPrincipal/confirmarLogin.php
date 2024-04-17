<?php
    include("../basedados/db.h");

    session_start();

    $username = $_POST["username"];
    $_SESSION["username"] = $username;
    $password = $_POST["password"];
    $botao = $_POST["botao"];

    if(isset($botao)){
        if(isset($username, $password)){

            $sqlSelect = "SELECT password FROM conta WHERE username = '".$_SESSION["username"]."'";
            $resultSelect = mysqli_query($conn, $sqlSelect);

            if($resultSelect->num_rows > 0){
                $row = $resultSelect->fetch_assoc();
                $pass = $row["password"];
                echo $pass . "<br>";
                //$passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);


                //comparacao com pass encriptada
                if(md5($password) == $pass){
                    echo "as passwords conicidem";
                }else{
                    echo "password errada". "<br>";
                    echo $pass ."<br>";
                    echo md5($password);
                }

                //comparacao sem estar encriptada
                /*if($pass == $password){
                    echo "as passwords coincidem";
                }else{
                    echo "password incorreta";
                }*/


            }else{
                echo "palavra-passe nao encontrada";
            }

        }else{
            echo "<script>window.alert('Preencha todos os campos') ;</script>";
        }
    }

    $conn -> close();

?>