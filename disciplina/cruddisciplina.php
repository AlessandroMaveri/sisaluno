<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nomedisciplina = $_GET["nomedisciplina"];
        $ch = $_GET["ch"];
        $idprofessor = $_GET["idprofessor"];
        $semestre = $_GET["semestre"];
       
        
       

        ##codigo SQL
        $sql = "INSERT INTO disciplina(nomedisciplina, ch, idprofessor, semestre) 
                VALUES('$nomedisciplina','$ch','$idprofessor', '$semestre')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> a Disciplina
                $nomedisciplina foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='indexdisciplina.php'>voltar</a></button>";
            }
        }
#######alterar
if (isset($_POST['update'])) {
    // Dados recebidos pelo método POST
    $id = $_POST["id"]; // Certifique-se de que você está recebendo o ID corretamente
    $nomedisciplina = $_POST["nomedisciplina"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["idprofessor"];
   
    
    // Código SQL
    $sql = "UPDATE disciplina SET nomedisciplina = :nomedisciplina, ch = :ch, semestre = :semestre, idprofessor = :idprofessor WHERE id = :id";
   
    // Junta o código SQL à conexão do banco
    $stmt = $conexao->prepare($sql);

    // Define os parâmetros e seus tipos
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nomedisciplina', $nomedisciplina, PDO::PARAM_STR);
    $stmt->bindParam(':ch', $ch, PDO::PARAM_INT);
    $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor', $idprofessor, PDO::PARAM_INT);
   
    


    $stmt->execute();
    header("Location: listadisciplina.php");

}

       


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `disciplina` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o Disciplina
             $id foi excluido!!!"; 

            echo " <button class='button'><a href='listadisciplina.php'>voltar</a></button>";
        }

}

        
?>