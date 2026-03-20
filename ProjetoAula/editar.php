<!-- PHP -->
<?php 
require __DIR__ . "/inc/funcoes.php";

$id = trim((string)($_GET["id"] ?? ""));

if ( $id === "") {
    die("ID inválido.");
}

$alunos = lerAlunos();

$alunoEncontrado = null;

foreach ($alunos as $aluno) {
    
    if ((string) ($aluno["id"] ?? "") === $id) {
        $alunoEncontrado = $aluno;
        break;
    }
}

if (!$alunoEncontrado) {
    die("Aluno não encontrado.");
}

?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="box-main">
        
            <h1>Editar Aluno</h1>
            
            <form action="atualizar.php" method="post">

                <input type="hidden" name="id" value="<?= htmlspecialchars((string)$alunoEncontrado["id"]) ?>">
                
                <label>Nome</label>
                <input 
                    type="text" 
                    name="nome" 
                    placeholder="Nome"
                    required 
                    minlength="3" 
                    value="<?= htmlspecialchars((string)$alunoEncontrado["nome"]) ?>"
                >

                <label>Nota 1</label>
                <input 
                    type="number" 
                    name="nota1" 
                    placeholder="Nota 1"
                    min="0"
                    max="10"
                    required 
                    value="<?= htmlspecialchars((string)$alunoEncontrado["nota1"]) ?>"
                >
                
                <label>Nota 2</label>
                <input 
                    type="number" 
                    name="nota2" 
                    min="0"
                    max="10"
                    required 
                    value="<?= htmlspecialchars((string)$alunoEncontrado["nota2"]) ?>"
                >   

                <button type="submit">Salvar alterações</button>

            </form>

            <a href="lista.php">Ver lista</a>
        </div>
    </main>
</body>
</html>