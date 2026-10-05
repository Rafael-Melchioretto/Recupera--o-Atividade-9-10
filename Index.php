<?php

require_once 'config/database.php';

$sql = "SELECT * FROM produtos ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestão de Estoque</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">

        <h1>Sistema de Gestão de Estoque</h1>

        <a class="botao" href="produtos/cadastrar.php">
            Cadastrar Produto
        </a>

        <hr>

        <h2>Produtos cadastrados</h2>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Validade</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php if (count($produtos) > 0): ?>

                    <?php foreach ($produtos as $produto): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($produto['id']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($produto['nome']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($produto['categoria']) ?>
                            </td>

                            <td>
                                R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($produto['quantidade']) ?>
                            </td>

                            <td>
                                <?= date('d/m/Y', strtotime($produto['data_validade'])) ?>
                            </td>

                            <td>

                                <a href="produtos/visualizar.php?id=<?= $produto['id'] ?>">
                                    Visualizar
                                </a>

                                |

                                <a href="produtos/editar.php?id=<?= $produto['id'] ?>">
                                    Editar
                                </a>

                                |

                                <form
                                    action="produtos/excluir.php"
                                    method="POST"
                                    style="display: inline;"
                                    onsubmit="return confirm('Deseja realmente excluir este produto?');"
                                >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= htmlspecialchars($produto['id']) ?>"
                                    >

                                    <button type="submit">
                                        Excluir
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="7">
                            Nenhum produto cadastrado.
                        </td>
                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</body>

</html>