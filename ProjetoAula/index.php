<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Iosevka+Charon+Mono:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="box-main">
            <h1>Cadastro Aluno</h1>
                    
            <form action="processa.php" method="post" id="caixa-pesquisa">

                <input type="text" name="nome" placeholder="Nome">
                <input type="number" name="nota1" placeholder="Nota 1">
                <input type="number" name="nota2" placeholder="Nota 2">
               
                <button type="submit">Cadastrar</button>

            </form>
                    
            <a href="lista.php">Alunos cadastrados</a>
        </div>  
    </main>
</body>
</html>