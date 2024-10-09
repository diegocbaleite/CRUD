<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if ($sql->rowCount() > 0) {
   $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Listar Usuários</title>
</head>
<style>
    body {
        background-color: #f0f0f0;
    }
</style>
<body>
    <div class="container mt-5">
        <h1>Lista de Usuários</h1>
        
        <!-- Adiciona o link para adicionar usuário -->
        <a href="adicionar.php" class="btn btn-success mb-3">ADICIONAR USUÁRIO</a>

        <!-- Tabela com estilos Bootstrap -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['id']); ?></td>
                        <td><?= htmlspecialchars($usuario['nome']); ?></td>
                        <td><?= htmlspecialchars($usuario['email']); ?></td>
                        <td>
                            <a href="editar.php?id=<?= $usuario['id']; ?>" class="btn btn-primary">Editar</a>
                            <a href="excluir.php?id=<?= $usuario['id']; ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
