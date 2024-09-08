<?php
    require("connect.php");

    if (!$dbconn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }

    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $suggestion_type = $_POST['suggestion_type'];
    $suggestion = $_POST['suggestion'];

    $sql = "INSERT INTO suggestions (nome, email, whatsapp, suggestion_type, suggestion)
            VALUES ('$nome', '$email', '$whatsapp', '$suggestion_type', '$suggestion')";

    if ($dbconn->query($sql) === TRUE) {
        echo "<center><h1>Sugestão ou Crítica salva com sucesso</h1>";
        echo "<a href='../index.html'><input type='button' value='Voltar'></a></center>";
    } else {
        echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $dbconn->error;
    }

    // Fechar a conexão 
    mysqli_close($dbconn);
?>
