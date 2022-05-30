<?php 
    // SCRIPT DE CONEXAO AO SERVIDOR BANCO DE DADOS
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "crud_escola_matheus";

    // try/catch

    try {
        $conexao = new PDO( // PDO é uma API
            "mysql:host=$servidor; dbname=$banco; charset=utf8",
            $usuario,
            $senha);

         // habilita a verificação de erros
        $conexao->setAttribute(
        PDO::ATTR_ERRMODE, // constante de erros em geral 
        PDO::ERRMODE_EXCEPTION); // constante de exceções de erro
    
    } catch (Exception $erro){
        die("erro: " .$erro->getMessage()); // die vai mostrar uma mensagem personalizada e vai parar o programa completamente.
        // getline vai mostrar a linha em que esta dando erro no codigo
        
    }

     // string com o comando SQL
     // $sql = "SELECT id, nome FROM fabricantes";

     // preparação do comando
     // $consulta = $conexao->prepare($sql);

     // execução do comando
     // $consulta->execute();

     // capturar os resultados
     //  $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

     // echo"<pre>";
     // var_dump($resultado);
     // echo"</pre>";
