<!-- Projeto Integrador - Erasmo Cardoso -->

<?php

require('./crud/connect.php');

function updateID($id)
{
    global $dbconn;

    if (!$dbconn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }

    $id = intval($id);
    $sql = "SELECT * FROM suggestions WHERE id = $id";
    $result = mysqli_query($dbconn, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($dbconn));
    }

    $suggestion = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($dbconn);

    return $suggestion;
}

// Atualiza os dados selecionados
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $nome = mysqli_real_escape_string($dbconn, $_POST['nome']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);
    $whatsapp = mysqli_real_escape_string($dbconn, $_POST['whatsapp']);
    $suggestion_type = mysqli_real_escape_string($dbconn, $_POST['suggestion_type']);
    $suggestion = mysqli_real_escape_string($dbconn, $_POST['suggestion']);

    $sql = "UPDATE suggestions SET nome = '$nome', email = '$email', whatsapp = '$whatsapp', suggestion_type = '$suggestion_type', suggestion = '$suggestion' WHERE id = $id";
    if (mysqli_query($dbconn, $sql)) {
        echo "<script>alert('Sugestão atualizada com sucesso.'); window.location.href = 'reader.php';</script>";
    } else {
        echo "Erro ao atualizar a sugestão: " . mysqli_error($dbconn);
    }
    exit;
}

// Pega o ID 
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$suggestion = updateID($id);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Sugestão</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-sm" style="max-width: 600px; width: 100%">
            <h2 class="text-center mb-4">Editar Mensagem</h2>
            <form method="POST" action="./crud/edit.php">
                <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($suggestion['id']); ?>" />
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        class="form-control"
                        value="<?php echo htmlspecialchars($suggestion['nome']); ?>"
                        required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="<?php echo htmlspecialchars($suggestion['email']); ?>"
                        required />
                </div>
                <div class="mb-3">
                    <label for="whatsapp" class="form-label">WhatsApp:</label>
                    <input
                        type="text"
                        id="whatsapp"
                        name="whatsapp"
                        class="form-control"
                        value="<?php echo htmlspecialchars($suggestion['whatsapp']); ?>"
                        required />
                </div>
                <div class="mb-3">
                    <label for="suggestion_type" class="form-label">Tipo:</label>
                    <select
                        id="suggestion_type"
                        name="suggestion_type"
                        class="form-select"
                        required>
                        <option value="Sugestao" <?php echo $suggestion['suggestion_type'] === 'Sugestao' ? 'selected' : ''; ?>>Sugestão</option>
                        <option value="Critica" <?php echo $suggestion['suggestion_type'] === 'Critica' ? 'selected' : ''; ?>>Crítica</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="suggestion" class="form-label">Mensagem:</label>
                    <textarea
                        id="suggestion"
                        name="suggestion"
                        class="form-control"
                        rows="4"
                        required><?php echo htmlspecialchars($suggestion['suggestion']); ?></textarea>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="reader.php" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>