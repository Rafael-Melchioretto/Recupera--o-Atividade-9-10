<label>Descrição:</label><br>

        <textarea
            name="descricao"
            rows="5"
        ><?= htmlspecialchars($produto['descricao']) ?></textarea>

        <br><br>

        <label>Preço:</label><br>

        <input
            type="number"
            name="preco"
            step="0.01"
            min="0"
            value="<?= htmlspecialchars($produto['preco']) ?>"
            required
        >

        <br><br>

        <label>Quantidade:</label><br>

        <input
            type="number"
            name="quantidade"
            min="0"
            value="<?= htmlspecialchars($produto['quantidade']) ?>"
            required
        >

        <br><br>

        <label>Data de validade:</label><br>

        <input
            type="date"
            name="data_validade"
            value="<?= htmlspecialchars($produto['data_validade']) ?>"
            required
        >

        <br><br>

        <button type="submit">
            Salvar alterações
        </button>

    </form>

    <br>

    <a href="../index.php">
        Cancelar
    </a>

</body>

</html>