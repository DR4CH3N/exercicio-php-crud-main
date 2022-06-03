<?php
require_once 'src/conecta.php';
require_once "src/funcoes-alunos.php";

$listaDeAlunos = lerAlunos($conexao);
var_dump($listaDeAlunos);

/*
if (isset($_POST['cadastrar']) ) {

    // importando as funções e a conexão
    require_once 'src/funcoes-alunos.php';
    
$media = ($primeira + $segunda) /2;
if ($media >= 7) {
 $situacao = "aprovado";
}
else {
    $situacao = "reprovado";
}
 função inserir(parametros...) e depois o header
}
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <table>
            <caption>Lista de alunos</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>media</th>
                    <th>situacao</th>
                    
                    <!-- colspan faz com que uma coluna se mescle (fazer a mesclagem) a outra -->
                </tr>
            </thead>
            <tbody>
        <?php 
        // string com o comando SQL
       

        // preparação do comando
        

        // execução do comando
        

        // capturar os resultados
       

     // echo"<pre>";
     // var_dump($resultado);
     // echo"</pre>";


foreach ($listaDeAlunos as $aluno) {
        ?> 
        
        
        <tr>
            <td><?=$aluno["id"]?></td>
            <td><?=$aluno["nome"]?></td>
            <td><?=$aluno["primeira"]?></td>
            <td><?=$aluno["segunda"]?></td>
            <td><?=$aluno["media"]?></td>
            <td><?=$aluno["situacao"]?></td>

            
           
                                        <!-- valor do parametro  -->
            <td><a href="atualizar.php?id=<?=$aluno['id']?>">atualizar</a></td>
            <td><a class="excluir" href="excluir.php?id=<?=$aluno['id']?>">Excluir</a></td>
            <?php 
            
            ?>
                     <!-- parametro de URL -->
                     <!-- "&" faz a concatenação caso voce quiser concatenar varios parametros -->
            <!-- quando voce tem uma interrogação no link voce esta criando um parametro -->
        </tr> 
        <?php
       }
        ?>
            </tbody>
        </table>
    </div>
    <p><a href="inserir.php">Inserir novo aluno</a></p>
    <p><a href="atualizar.php">Atualizar aluno</a></p>
    <p><a href="excluir.php">Excluir aluno</a></p>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->


    <p><a href="index.php">Voltar ao início</a></p>

    <script src="js/confirma.js"></script>
</div>

</body>
</html>