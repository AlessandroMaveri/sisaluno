<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nome = $_GET["nome"];
        $idade = $_GET["idade"];
        $endereco = $_GET["endereco"];
        $datanascimento = $_GET["datanascimento"];
        $estatus = $_GET["estatus"];
       
        if ($estatus == "AP") {
            echo "Aprovado";
        } else {
            echo "Reprovado";
        }
        
       

        ##codigo SQL
        $sql = "INSERT INTO aluno(nome,idade,endereco, datanascimento, estatus) 
                VALUES('$nome','$idade','$endereco', '$datanascimento', '$estatus')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> o Aluno
                $nome foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='indexaluno.php'>voltar</a></button>";
            }
        }
#######alterar
if (isset($_POST['update'])) {
    // Dados recebidos pelo método POST
    $id = $_POST["id"]; // Certifique-se de que você está recebendo o ID corretamente
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $endereco = $_POST["endereco"];
    $datanascimento = $_POST["datanascimento"];
    $estatus = $_POST["estatus"];
   
    
    // Código SQL
    $sql = "UPDATE aluno SET nome = :nome, idade = :idade, endereco = :endereco, datanascimento = :datanascimento, estatus = :estatus WHERE id = :id";
   
    // Junta o código SQL à conexão do banco
    $stmt = $conexao->prepare($sql);

    // Define os parâmetros e seus tipos
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);
    


    $stmt->execute();
    header("Location: listaaluno.php");

}

       


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `aluno` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o Aluno
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='listaaluno.php'>voltar</a></button>";
        }

}

        
?>
