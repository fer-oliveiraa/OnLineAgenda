<?php
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se a senha está correta
    $senha_correta = 'senha123'; // Defina sua senha aqui

    if (isset($_POST['senha']) && $_POST['senha'] === $senha_correta) {
        // Senha correta, permitir acesso ao formulário de edição
        $_SESSION['authenticated'] = true; // Marca a sessão como autenticada

        // Redireciona para a página de edição da agenda
        header('Location: editar_agenda.php');
        exit;
    } else {
        // Senha incorreta, redireciona de volta para agenda.php com mensagem de erro
        $erro = "Senha incorreta. Tente novamente.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agenda</title>
</head>
<body>
    <h1>Login para Editar Agenda</h1>
    
    <?php if (isset($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <button type="submit">Entrar</button>
    </form>

</body>
</html>