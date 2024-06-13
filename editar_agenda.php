<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agenda</title>
    <link rel="stylesheet" href="agenda.css"> 
    <style>
        /* Estilos CSS adicionais, se necessário */
    </style>
</head>
<body>

<div class="edit-container">
    <h1>Editar Agenda</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conteudo = $_POST['conteudo'];
        file_put_contents('agenda.txt', $conteudo);
        echo "<p>Agenda salva com sucesso!</p>";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <textarea name="conteudo" rows="20" cols="80"><?php
            // Ler o conteúdo do arquivo agenda.txt
            $filename = 'agenda.txt';
            if (file_exists($filename)) {
                echo htmlspecialchars(file_get_contents($filename));
            }
        ?></textarea>
        <br>
        <div class="button-container">
            <button type="submit" class="edit-button">Salvar</button>
            <button type="button" class="edit-button" onclick="window.location.href='agenda.php'">Voltar para Agenda</button>
        </div>
    </form>
</div>

</body>
</html>
