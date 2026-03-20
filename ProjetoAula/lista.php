<?php 
require __DIR__ . "/inc/funcoes.php";

$alunos = lerAlunos();

$busca = trim((string)($_GET["busca"] ?? ""));
$buscaNorm = normalizarBusca($busca);

$alunosFiltrados = $alunos;

if ($buscaNorm !=="") {
    $alunosFiltrados = array_values(array_filter($alunos, function ($aluno) use ($buscaNorm) {
        $nomeNorm = normalizarBusca((string)($aluno["nome"] ?? ""));
        return str_contains($nomeNorm, $buscaNorm);
    }));
}

$total = count($alunos);

$totalFiltrado = count($alunosFiltrados);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="box-table">
            <h1>Alunos Cadastrados</h1>

            <p><strong>Total de alunos:</strong> <?= $total ?></p>

            <form action ="lista.php" method="GET" id="form-lista">
                <label>Buscar por nome:</label>
                <input type="text" name="busca" value="<?= htmlspecialchars($busca)?>" placeholder="Ex: Maria">
                <button type="submit">Buscar</button>
                <a href="lista.php">Limpar</a>

            </form>

            <p class="paragrafo-lista"> <strong> Mostrando: </strong> <?= $totalFiltrado ?> aluno(s).</p>

            <div class="table-container">
                <table class="tabela-alunos">
                    <tr>
                        <th>Nome</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Média</th>
                        <th>Situação</th>
                        <th>Ações</th>
                    </tr>

                <?php if ($totalFiltrado === 0 ):?>
                    <tr><td colspan="6">Nenhum aluno encontrado.</Td></tr>   
                <?php endif; ?>


                <?php foreach ($alunosFiltrados as $aluno): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) $aluno["nome"])?></td>
                        <td><?=(float) $aluno["nota1"]?></td>
                        <td><?=(float) $aluno["nota2"]?></td>

                        <td> <?=number_format((float) $aluno["media"], 2, ",", ".") ?></td>
                        <td> <?=htmlspecialchars((string) $aluno["situacao"]) ?></td> 
                                
                        <td>
                    <a href="editar.php?id=<?= htmlspecialchars((string) $aluno["id"]) ?>">Editar</a>

                    <form action="excluir.php" method="post" style="display:inline;" onsubmit="return confirm('Deseja excluir esse aluno?');">

                        <input type="hidden" name="id" value="<?=htmlspecialchars((string) $aluno["id"])?>">
                        <button type="submit">Excluir</button>

                    </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </table>
            </div>    
            <a href="index.php" id="cadastro">Novo Cadastro.</a>
        </div>    

    </main>

 

        
</body>
</html>