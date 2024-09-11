<!-- Projeto Integrador --- Erasmo Cardoso -->

<?php
require("connect.php");

function update()
{
    global $dbconn;

    if (!$dbconn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }

    // Verifica o método de requisição
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(["status" => "error", "message" => "Método de requisição incorreto"]);
        exit;
    }

    // Obtém os dados
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nome = isset($_POST['nome']) ? mysqli_real_escape_string($dbconn, $_POST['nome']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($dbconn, $_POST['email']) : '';
    $whatsapp = isset($_POST['whatsapp']) ? mysqli_real_escape_string($dbconn, $_POST['whatsapp']) : '';
    $suggestion_type = isset($_POST['suggestion_type']) ? mysqli_real_escape_string($dbconn, $_POST['suggestion_type']) : '';
    $suggestion = isset($_POST['suggestion']) ? mysqli_real_escape_string($dbconn, $_POST['suggestion']) : '';

    // Verifica se 'id' existe e é válido
    if ($id <= 0) {
        echo json_encode(["status" => "error", "message" => "ID inválido"]);
        exit;
    }

    // Prepara a query SQL usando prepared statements
    $sql = "UPDATE suggestions SET nome = ?, email = ?, whatsapp = ?, suggestion_type = ?, suggestion = ? WHERE id = ?";
    $stmt = mysqli_prepare($dbconn, $sql);

    if ($stmt === false) {
        echo json_encode(["status" => "error", "message" => "Erro ao preparar a consulta: " . mysqli_error($dbconn)]);
        exit;
    }

    // Liga os parâmetros
    mysqli_stmt_bind_param($stmt, 'sssssi', $nome, $email, $whatsapp, $suggestion_type, $suggestion, $id);

    // Executa a consulta
    if (mysqli_stmt_execute($stmt)) {
        echo "<center><h1>Atualizado com sucesso</h1>";
        echo "<a href='../index.html'><input type='button' value='Voltar'></a></center>";
    } else {
        echo json_encode(["status" => "error", "message" => "Erro ao atualizar: " . mysqli_stmt_error($stmt)]);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);
}

update();
