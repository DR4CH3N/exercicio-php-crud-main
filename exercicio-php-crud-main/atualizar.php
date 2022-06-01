<?php
require_once 'src/funcoes-alunos.php';

$alunos = lerAlunos($conexao);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$aluno = lerUmAluno($conexao, $id);

if (isset($_POST['atualizar']) ) {

    // importando as funções e a conexão
    

    // capturando o que foi digitado no campo nome
    //$nome = $_POST['nome'];
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota1 = filter_input(INPUT_POST, 'primeira', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $nota2 = filter_input(INPUT_POST, 'segunda', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    // filter input vai sanitizar o campo 'nome'  e vai adicionar o nome do filtro

    $media = ($nota1 + $nota2) /2;

    if ($media >= 7) {
    $situacao = "aprovado";
    }
    else {
    $situacao = "reprovado";
    }
    /*
    função inserir(parametros...) e depois o header
    }
    */

    // chamando a função e passando os dados de conexão e o nome digitado
    atualizarAluno($conexao, $id, $nome, $nota1, $nota2, $media, $situacao);

    // redirecionamento, vai redirecionar para listar.php quando voce terminar de inserir um fabricante
    header("location:visualizar.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="#" method="post">
        <input type="hidden" name="<?=$alunos['id']?>">
        
	    <p><label for="nome">Nome:</label>
	    <input value="<?=$alunos['nome']?>" type="text" name="nome" id="nome" required></p>
        
        <p><label for="primeira">Primeira nota:</label>
	    <input value="<?=$alunos['primeira']?>" name="primeira" type="number" id="primeira" step="0.1" min="0.0" max="10" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input value="<?=$alunos['segunda']?>" name="segunda" type="number" id="segunda" step="0.1" min="0.0" max="10" required></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media">Média:</label>
            <input value="<?=$alunos['media']?>" name="media" type="number" id="media" step="0.1" min="0.0" max="10" readonly disabled>
        </p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input name="<?=$alunos['situacao']?>" type="text" name="situacao" id="situacao" readonly disabled>
        </p>
	    
        <button name="atualizar">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

</div>


</body>
</html>