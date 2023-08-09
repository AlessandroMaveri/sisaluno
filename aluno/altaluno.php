<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="stylealtaluno.css">
</head>
<body>

<?php
    require_once('../conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM aluno where id= :id";
   
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
   $endereco = $array_retorno['endereco'];
   $datanascimento = $array_retorno['datanascimento'];
   $estatus = $array_retorno['estatus'];



?>
<div class="fundo">
    <div class="planodefundo">
               

  <form method="POST" action="crudaluno.php">
  <label for="endereco">Nome:<input type="text" name="nome" id="um" value=<?php echo $nome?> ></label>

  <label for="endereco">Idade: <input type="number" name="idade" id="um" value=<?php echo $idade ?> ></label>
</div>
<div class="planodefundo">
<label for="endereco"><input type="hidden" name="id" id="um" value=<?php echo $id?> ></label>
<label for="endereco">Data de nascimento: <input type="date" name="datanascimento" id="um" value=<?php echo $datanascimento?> ></label>
<label for="endereco">Endereço: <input type="text" name="endereco" id="um" value=<?php echo $endereco?> ></label>
</div>
<div class="planodefundo">

<label>Estatus</label>
    <label for="radiov">Aprovado</label>
    <input type="radio" id="um" required name="estatus" value="AP" <?php echo ($estatus === 'AP') ? 'checked' : '' ?>>
        
    <label for="radioF">Reprovado</label>
    <input type="radio" id="um" required name="estatus" value="RP" <?php echo ($estatus === 'RP') ? 'checked' : '' ?>
 >
        <input type="submit" name="update" id=but value="Alterar">
  </form></tr></thead>
</table></div> 
</div>
</div>



</body>
</html>
