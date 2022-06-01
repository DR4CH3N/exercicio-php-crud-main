<?php
require_once "conecta.php";

function lerAlunos(PDO $conexao):array {
    $sql = "SELECT id, nome, primeira, segunda, media, situacao FROM alunos ORDER BY nome";
    /*"SELECT produtos.id, produtos.nome AS produto, produtos.preco, produtos.descricao, produtos.quantidade, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id ORDER BY produto";*/

    // try vai tentar todos esses comandos
    try {
        $consulta = $conexao->prepare($sql);

        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        // PDO fetch assoc vai retornar o resultado em array
    }
    // catch vai executar os comandos dentro dele caso algum comando do try não de certo
    // die vai fazer com que o programa pare caso algum erro ocorra
    catch (Exception $erro) {
        die ("Erro: " .$erro->getMessage());
    }
    return $resultado;
}

    
// inserir um aluno
function inserirAluno(PDO $conexao, string $nome, float $nota1, float $nota2, float $media, string $situacao):void {
    $sql = "INSERT INTO alunos(nome, primeira, segunda, media, situacao) VALUES (:nome, :primeira, :segunda, :media, :situacao)";
    //(:nome) é um parametro e não deve ser usado como variavel ou const
    // Void e um comando que indica que a função nao vai ter retorno
    try {
        // try vai tentar todos esses comandos
        $consulta = $conexao->prepare($sql);
        // PDO vai tratar o parametro como string, no caso tratar ele
        // a sintaxe do bindParam funciona assim: bindParam('nome do parametro', $variavel_com_valor, constante de verificação)
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':primeira', $nota1, PDO::PARAM_STR);
        $consulta->bindParam(':segunda', $nota2, PDO::PARAM_STR);
        $consulta->bindParam(':media', $media, PDO::PARAM_STR);
        $consulta->bindParam(':situacao', $situacao, PDO::PARAM_STR);
        $consulta->execute();
        
    } catch (Exception $erro) {
        // catch vai executar esses comandos caso algo der errado

        die("erro: " .$erro->getMessage());
        // die vai fazer com que o codigo pare caso tiver algum erro, no caso vai mostrar uma mensagem de erro e vai parar o programa
    }
}

function lerUmAluno(PDO $conexao, int $id) {
    $sql = "SELECT id, nome, primeira, segunda, media, situacao FROM alunos WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);       
    } catch (Exception $erro) {
        die("erro: " .$erro->getMessage());
    }
    return $resultado;
}

function atualizarAluno(PDO $conexao, int $id, string $nome, float $nota1, float $nota2, float $media, string $situacao):void {
    $sql = "UPDATE alunos SET nome = :nome, primeira = :primeira, segunda = :segunda, media = :media, situacao = :situacao WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':primeira', $nota1, PDO::PARAM_STR);
        $consulta->bindParam(':segunda', $nota2, PDO::PARAM_STR);
        $consulta->bindParam(':media', $media, PDO::PARAM_STR);
        $consulta->bindParam(':situacao', $situacao, PDO::PARAM_STR);
        $consulta->execute();
    } catch (Exception $erro) {
        die("erro: " .$erro->getMessage());
    }
}

function excluirAluno(PDO $conexao, int $id):void {
    $sql = "DELETE FROM alunos WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("erro: " .$erro->getMessage());
    }
}

