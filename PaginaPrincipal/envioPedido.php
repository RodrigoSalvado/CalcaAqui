<?php
global $conn;
include("../basedados/db.h");

$username = $_POST["username"];
$tipo_servico = $_POST["tipo_servico"];
$botao = $_POST["botao"];
$descricao = $_POST["descricao"];
$tipo_calcado = $_POST["tipo_calcado"];
$foto = $_FILES["file"];
$senha = gerarCodigoAleatorio(5);

function gerarCodigoAleatorio($tamanho) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
    $codigo = '';
    for ($i = 0; $i < $tamanho; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

if(isset($botao)) {


    if(strcmp($foto['name'], "")!= 0) {

        try{
            $fotoUp = explode('.', $foto['name']);
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'svg'];

            $extension = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
            if (in_array($extension, $allowed_extensions)) {
                $nomeFoto = trim($foto['name'], " ");
                echo $nomeFoto;
                move_uploaded_file($foto['tmp_name'], 'images/'.$nomeFoto);

            } else {
                die("O arquivo não possui uma extensão permitida. Use  jpg, jpeg, png, svg");
            }
        }catch(Exception $e){

        }
    }

    $sql = "SELECT id_utilizador FROM utilizador WHERE username = '$username';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

    $id_utilizador = $row["id_utilizador"];


    $sql = "INSERT INTO `pedido_reparacao`(`id_utilizador`, `descricao`, `servico`, `calcado`, `foto`, `senha`) VALUES 
                                        ('$id_utilizador', '$descricao', '$tipo_servico', '$tipo_calcado', '$nomeFoto', '$senha')";

    $resultInsert = $conn->query($sql);

    if($resultInsert){
        echo "O seu pedido foi criado com sucesso!";
        header("Location: index.php");

    }else{
        echo "<script>window.alert('Não foi possivel criar o pedido! Tente novamente.') ; window.location.href = 'formularioPedido.php';</script>";
    }



}

    $conn -> close();
?>
