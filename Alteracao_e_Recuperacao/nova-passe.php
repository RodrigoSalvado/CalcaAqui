<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de senha foram enviados e não estão vazios
    if (isset($_POST["novaSenha"]) && isset($_POST["confirmarSenha"]) && !empty($_POST["novaSenha"]) && !empty($_POST["confirmarSenha"])) {
        // Recupera as senhas enviadas pelo formulário
        $novaSenha = $_POST["novaSenha"];
        $confirmarSenha = $_POST["confirmarSenha"];

        // Verifica se as senhas coincidem
        if ($novaSenha === $confirmarSenha) {
            // Aqui meter lógica procedimento armazenado na base de dados Oracle

            // Estabelece conexão com a base de dados (substituir credenciais)
            $conn = oci_connect('seu_usuario', 'sua_senha', 'localhost/XE');
            
            if (!$conn) {
                $e = oci_error();
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            }

            // Chama o procedimento armazenado
            $stmt = oci_parse($conn, "BEGIN alterar_senha_usuario(:id_usuario, :nova_senha); END;");
            oci_bind_by_name($stmt, ':id_usuario', $idUsuario);
            oci_bind_by_name($stmt, ':nova_senha', $novaSenha);
            oci_execute($stmt);

            echo "<p>Senha alterada com sucesso!</p>";

            // Fecha a conexão com a base de dados
            oci_close($conn);
        } else {
            echo "<p>As senhas não coincidem. Por favor, tente novamente.</p>";
        }
    } else {
        echo "<p>Por favor, preencha todos os campos.</p>";
    }
}
?>

