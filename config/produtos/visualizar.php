<?php

require_once '../config/database.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die('Produto inválido.');
}

$sql = "SELECT * FROM produtos WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die('Produto não encontrado.');
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Visualizar Produto</title>

</head>

<body>

    <h1>Detalhes do Produto</h1>

    <p>
        <strong>Nome:</strong>

        <?= htmlspecialchars($produto['nome']) ?>
    </p>

    <p>
        <strong>Categoria:</strong>

        <?= htmlspecialchars($produto['categoria']) ?>
    </p>

    <p>
        <strong>Descrição:</strong>

        <?= nl2br(htmlspecialchars($produto['descricao'])) ?>
    </p>

    <p>
        <strong>Preço:</strong>

        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
    </p>

    <p>
        <strong>Quantidade:</strong>

        <?= htmlspecialchars($produto['quantidade']) ?>
    </p>

    <p>
        <strong>Data de validade:</strong>

        <?= date('d/m/Y', strtotime($produto['data_validade'])) ?>
    </p>

    <a href="../index.php">
        Voltar
    </a>

</body>

</html>