<?php
// Decidi criar uma função para conectar com o banco de dados
function connect() {
    $servername = "db";
    $database = "projintegrador";
    $username = "root";
    $password = "3727";

    $maxConnect = 5; //tentativas de conectar com mysql
    $retryDelay = 2; 

    $replayConnect = 0;
    $dbconn = false;

    while ($replayConnect < $maxConnect) {
        //  criar a conexão
        $dbconn = mysqli_connect($servername, $username, $password, $database);

        if ($dbconn) {
            // Se a conectar, sai do loop
            return $dbconn;
        } else {
            // Se a conexão falhar, incrementa e tentar novamente
            $replayConnect++;
            echo "Tentativa de conexão falhou. Tentando novamente em $retryDelay segundos...\n";
            sleep($retryDelay);
        }
    }

    // Se todas as tentativas falharem, exibe uma mensagem de erro e encerra 
    die("Não foi possível conectar ao banco de dados após $maxConnect tentativas.");
}

// função de conexão
$dbconn = connect();





