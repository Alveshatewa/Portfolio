<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Função para limpar os dados de entrada
    function limparEntrada($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Inicializa as variáveis
    $nome = limparEntrada($_POST['nome']);
    $email = limparEntrada($_POST['email']);
    $mensagem = limparEntrada($_POST['texto']);

    // Validação dos campos
    $errors = [];

    if (empty($nome)) {
        $errors[] = "O campo Nome é obrigatório.";
    }

    if (empty($email)) {
        $errors[] = "O campo E-mail é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Formato de e-mail inválido.";
    }

    if (empty($mensagem)) {
        $errors[] = "O campo Mensagem é obrigatório.";
    }

    // Se houver erros, exibe-os
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        // Se não houver erros, tenta enviar o e-mail
        $to = "almohawa90@gmail.com";  // Insira o endereço de e-mail para onde você quer enviar a mensagem
        $subject = "Email Vindo do site AlfaCode";
        $body = "Nome: $nome\n Email: $email\n Mensagem:\n$mensagem";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Mensagem de contacto enviada com sucesso!";
        } else {
            echo "Falha ao enviara sua mensagemhttps://formsubmit.co/your@email.com.";
        }
    }
}
?>