<?php
global $conn;
include("../basedados/db.h");

$username = $_POST["username"];
$tipo_servico = $_POST["tipo_servico"];
$botao = $_POST["botao"];
$descricao = $_POST["descricao"];
$tipo_calcado = $_POST["tipo_calcado"];
$foto = $_FILES["file"];

if(isset($botao)) {


    if(isset($foto)) {
        try{
            $fotoUp = explode('.', $foto['name']);
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'svg'];

            $extension = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
            if (in_array($extension, $allowed_extensions)) {
                $nomeFoto = trim($foto['name'], " ");
                echo $nomeFoto;
                move_uploaded_file($foto['tmp_name'], 'fotos-pedidos/'.$nomeFoto);

            } else {
                die("O arquivo não possui uma extensão permitida. Use  jpg, jpeg, png, svg");
            }
        }catch(Exception $e){

        }
    }


    echo "Username: ".$username."<br>";
    echo "Tipo Servico: ".$tipo_servico."<br>";
    echo "Descricao: ".$descricao."<br>";
    echo "Tipo Calcado: ".$tipo_calcado."<br>";

    $sql = "SELECT id_utilizador FROM utilizador WHERE username = '$username';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

    $id_utilizador = $row["id_utilizador"];

    echo "Id: ".$id_utilizador."<br>";


    $sql = "INSERT INTO `pedido_reparacao`(`id_utilizador`, `descricao`, `servico`, `calcado`, `foto`) VALUES 
                                        ('$id_utilizador', '$descricao', '$tipo_servico', '$tipo_calcado', '$nomeFoto')";

    $resultInsert = $conn->query($sql);

    if($resultInsert){
        echo "O seu pedido foi criado com sucesso!";
        header("Location: PaginaPrincipal.php");

    }else{
        echo "<script>window.alert('Não foi possivel criar o pedido! Tente novamente.') ;</script>";
    }



}

    $conn -> close();
?>
