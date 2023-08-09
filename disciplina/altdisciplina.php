<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="stylealtdisciplina.css">
</head>
<body>

<?php
    require_once('../conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM disciplina where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno = $retorno->fetch();
   
   
   ##armazena retorno em variaveis
   $nomedisciplina = $array_retorno['nomedisciplina'];
   $ch = $array_retorno['ch'];
   $semestre = $array_retorno['semestre'];
   $idprofessor = $array_retorno['idprofessor'];

   
  



?>
<div class="fundo">
    <div class="planodefundo">
               

  <form method="POST" action="cruddisciplina.php">
  <label for="endereco">Nome:<input type="text" name="nomedisciplina" id="um" value=<?php echo $nomedisciplina?> ></label>

  <label for="endereco">Carga Horaria: <input type="number" name="ch" id="um" value=<?php echo $ch ?> ></label>
</div>
<div class="planodefundo">
<label for="endereco"><input type="hidden" name="id" id="um" value=<?php echo $id?> ></label>
<label for="endereco">Semestre: <select id="um" name="semestre">
  <option value="0"></option>
  <option value="1" <?php if ($semestre == "1") echo "selected='selected'"; ?>>1º Semestre</option>
  <option value="2" <?php if ($semestre == "2") echo "selected='selected'"; ?>>2º Semestre</option>
  <option value="3" <?php if ($semestre == "3") echo "selected='selected'"; ?>>3º Semestre</option>
  <!-- Adicione mais opções conforme necessário -->
</select></label>

<label for="idprofessor">ID professor: <input type="text" name="idprofessor" id="um" value=<?php echo $idprofessor?> ></label>
</div>
<div class="planodefundo">


        <input type="submit" name="update" id=but value="Alterar">
  </form></tr></thead>
</table></div> 
</div>
</div>



</body>
</html>