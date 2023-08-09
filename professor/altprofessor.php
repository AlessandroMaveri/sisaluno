<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="stylealtprofessor.css">
</head>
<body>

<?php
    require_once('../conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM professor where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno = $retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $idade = $array_retorno['idade'];
   $cpf = $array_retorno['cpf'];
   $endereco = $array_retorno['endereco'];
   $datanascimento = $array_retorno['datanascimento'];
   $estatus = $array_retorno['estatus'];



?>
<div class="fundo">
    <div class="planodefundo">
               

  <form method="POST" action="crudprofessor.php">
  <label for="endereco">Nome:<input type="text" name="nome" id="um" value=<?php echo $nome?> ></label>

  <label for="endereco">Idade: <input type="number" name="idade" id="um" value=<?php echo $idade ?> ></label>
</div>
<div class="planodefundo">
<label for="endereco"><input type="hidden" name="id" id="um" value=<?php echo $id?> ></label>

<label for="endereco">CPF: <input type="text" name="cpf" id="um" value=<?php echo $cpf?> ></label>
        
<label for="endereco">Endereço: <input type="text" name="endereco" id="um" value=<?php echo $endereco?> ></label>
</div>
<div class="planodefundo">

<label for="endereco"><p>Data de nascimento:</p> <input type="date" name="datanascimento" id="um" value=<?php echo $datanascimento?> ></label>

<label>Estatus</label>
    <label for="radiov">Ativo</label>
    <input type="radio" id="um" required name="estatus" value="0" <?php echo ($estatus === '0') ? 'checked' : '' ?>>
        
    <label for="radioF">Não ativo</label>
    <input type="radio" id="um" required name="estatus" value="1" <?php echo ($estatus === '1') ? 'checked' : '' ?>
 >
 
        
        <input type="submit" name="update" id=but value="Alterar">
  </form></tr></thead>
</table></div> 
</div>
</div>



</body>
</html>