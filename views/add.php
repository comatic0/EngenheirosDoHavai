<?php
require '../includes/db.php';
require '../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $sistema = $_POST['sistema'];
    $jogadores = $_POST['jogadores'];
    $descricao = $_POST['descricao'];

    // Função de adicionar mesa no banco de dados
    addTable($pdo, $nome, $sistema, $jogadores, $numero_max_jogadores, $categoria);
    header('Location: index.php');
    exit();
}
?>
    <main>
        <div class="container">
            <h2>Nova Mesa</h2>
            <form method="post">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="sistema">Sistema:</label>
                    <select id="sistema" name="sistema" required>
                        <option value="dnd">Dungeons & Dragons</option>
                        <option value="coc">Call of Cthulhu</option>
                        <option value="OP">Ordem Paranormal</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jogadores">Número de Jogadores:</label>
                    <select id="jogadores" name="jogadores" required>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <button type="button" class="add-player-btn">+ Adicionar Jogadores</button>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao" placeholder="Ex.: Um grupo de aventureiros..."></textarea>
                </div>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </main>

<?php include '../includes/footer.php'; ?>