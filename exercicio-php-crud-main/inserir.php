<?php

if (isset($_POST['cadastrar']) ) {

    // importando as funções e a conexão
    require_once 'src/funcoes-alunos.php';

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
    inserirAluno($conexao, $nome, $nota1, $nota2, $media, $situacao);

    // redirecionamento, vai redirecionar para listar.php quando voce terminar de inserir um fabricante
    header("location:visualizar.php");
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL | </title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno | INSERT</h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="#" method="post">
	    <p><label for="nome">Nome:</label>
	    <input name="nome" type="text" id="nome" required></p>
        
      <p><label for="primeira">Primeira nota:</label>
	    <input name="primeira" type="number" id="primeira" step="0.1" min="0.0" max="10" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input name="segunda" type="number" id="segunda" step="0.1" min="0.0" max="10" required></p>
	    
      <button name="cadastrar">Cadastrar aluno</button>
	</form>
	<!-- 
	COLOCAR NAME NOS FORMULARIOS OU O CODIGO NÃO VAI FUNCIONAR!!
	-->

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>