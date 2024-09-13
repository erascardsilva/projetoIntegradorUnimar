<!-- Projeto Integrador --- Erasmo Cardoso -->
<?php

/*Decidi usar um arquivo .env, porque como montei o projeto em docker e
foi passado para ser usado em Xampp criei o .env que mantem as duas configuraçôes
biblioteca utilizada (vlucas/phpdotenv) instalada via composer
*/
require_once __DIR__ . './../vendor/autoload.php'; // Caminho correto para autoload.php

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__ . './../'); // Caminho para .env
$dotenv->load();

// Decidi criar uma função para conectar com o banco de dados
function connect(){
    //dados 
    $servername = $_ENV['DB_HOST'];
    $database = $_ENV['DB_DATABASE'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    
    

    $maxConnect = 5; //tentativas de conectar com mysql
    $retryDelay = 2; 

    $replayConnect = 0;
    $dbconn = false;

    while ($replayConnect < $maxConnect) {
        //  crio a conexão
        $dbconn = mysqli_connect($servername, $username, $password, $database);

        if ($dbconn) {
            // Se nao conectar, sai do loop
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

// Tabela "suggestions" se nao existir sera criada "CREATE TABLE IF NOT EXISTS"
$query = "CREATE TABLE IF NOT EXISTS suggestions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    whatsapp VARCHAR(20),
    suggestion_type ENUM('Sugestao', 'Critica') NOT NULL,
    suggestion TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($dbconn, $query)) {
    echo "<p class='success'>Conectado.</p>";
} else {
    echo "<p class='error'>Erro ao criar tabela: " . mysqli_error($dbconn) . "</p>";
}

// mysqli_close($dbconn);
// ?>



