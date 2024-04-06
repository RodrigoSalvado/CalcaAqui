<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = $_POST["email"];

        $codigo_recuperacao = mt_rand(100000, 999999); // Código de 6 dígitos
        
        //detalhes do e-mail
        $assunto = "Recuperação de senha";
        $mensagem = "Olá, você solicitou a recuperação de senha para o e-mail $email.
                     Aqui está o seu código de recuperação: $codigo_recuperacao";
        $remetente = "seuemail@example.com";
        $headers = "From: $remetente";

         // Estabelece conexão com a base de dados (substituir credenciais)
         $servername = "localhost";
         $username = "seu_usuario";
         $password = "passe";
         $dbname = "nome_da_base_de_dados";
 
         $conn = new mysqli($servername, $username, $password, $dbname);
 
         // Verifica se a conexão foi estabelecida com sucesso
         if ($conn->connect_error) {
             die("Falha na conexão com a base de dados: " . $conn->connect_error);
         }
 
         // Verifica se o e-mail existe na base de dados (mudar variaveis)
         $sql = "SELECT * FROM utilizadores WHERE email = '$email'";
         $result = $conn->query($sql);
 
         // Verifica se o e-mail foi encontrado na base de dados
         if ($result->num_rows > 0) {
            
            echo "<p>Um e-mail de recuperação foi enviado para $email. Por favor, verifique sua caixa de entrada.</p>";

        } else {
            // msg de erro caso haja falha a enviar o email
            echo "<p>Ocorreu um erro ao enviar o e-mail. Por favor, tente novamente mais tarde.</p>";
        }
    } else {
        // msg de erro, caso não insiram email
        echo "<p>O campo de e-mail é obrigatório.</p>";
    }
}
?>