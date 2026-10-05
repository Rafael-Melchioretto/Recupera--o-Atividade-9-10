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
            value="<?= $produto['id'] ?>"
        >

        <button type="submit">
            Excluir
        </button>

    </form>

</td>