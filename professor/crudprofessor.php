<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if (isset($_GET['cadastrar'])) {
    // Dados recebidos pelo método GET
    $nome = $_GET["nomeprofessor"];
    $idade = $_GET["idade"];
    $cpf = $_GET["cpf"];
    $endereco = $_GET["endereco"];
    $datanascimento = $_GET["datanascimento"];
    $estatus = $_GET["estatus"];

    if ($estatus == "0") {
        echo "Ativo";
    } else {
        echo "Não ativo";
    }
    

        ##codigo SQL
        $sql = "INSERT INTO professor(nome,idade,cpf,endereco, datanascimento, estatus) 
                VALUES('$nome','$idade','$cpf','$endereco', '$datanascimento', '$estatus')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> o Professor
                $nome foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='indexprofessor.php'>voltar</a></button>";
            }
        }
#######alterar
if (isset($_POST['update'])) {
    // Dados recebidos pelo método POST
    $id = $_POST["id"]; // Certifique-se de que você está recebendo o ID corretamente
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $datanascimento = $_POST["datanascimento"];
    $estatus = $_POST["estatus"];
    
    // Código SQL
    $sql = "UPDATE professor SET nome = :nome, idade = :idade, cpf = :cpf, endereco = :endereco, datanascimento = :datanascimento, estatus = :estatus WHERE id = :id";
   
    // Junta o código SQL à conexão do banco
    $stmt = $conexao->prepare($sql);

    // Define os parâmetros e seus tipos
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_BOOL);

    if ($stmt->execute()) {
        echo "<strong>OK!</strong> O Professor $nome foi alterado com sucesso!!!"; 
        echo "<button class='button'><a href='listaprofessor.php'>Voltar</a></button>";
    } else {
        echo "Erro ao executar a atualização.";
    }
}

       


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `Professor` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o Professor
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='listaprofessor.php'>voltar</a></button>";
        }

}

        
?>