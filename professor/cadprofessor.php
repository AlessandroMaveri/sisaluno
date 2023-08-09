<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylecadprofessor.css">
  <title>Document</title>
</head>

<body>

  <div class="fundo">
    <div class="planodefundo">
      <form method="GET" action="crudprofessor.php" class="form-cadastro" onsubmit="return validateForm()">

        <div class="preenchimento-dados">
          <label for="nomeprofessor">Nome:
          <input type="text" name="nomeprofessor" class="um" required></label>
        
        <label for="idade">Idade:
        <input type="number" name="idade" value="idade" class="um" min="0" required>
        <script>
        window.onload = function()
        {
            document.getElementById('inputNumber').addEventListener('keydown', function(event)
            {
                if (!Math.sign(event.key))
                {
                    event.preventDefault();
                }
            });
        }
        </script>
      </label>
     </div>
      <div class="preenchimento-dados">
        <label for="cpf">CPF:
        <input type="text" name="cpf" class="um" minlength="14" maxlength="14" required></label>

        <label for="endereco">Endereço:
        <input type="text" name="endereco" class="um" required></label>
      </div>
      <div class="radio">

        <label for="datanascimento">datanascimento:
        <input type="date" name="datanascimento" class="um"></label>

        <label for="estatus">estatus:
          <input type="radio" name="estatus" required value="0" id="ativo">Ativo</label>
          <label for="naoativo">
          <input type="radio" name="estatus"  value="1" required id="naoativo">Não Ativo</label>

      </div>
<div class="sbutton">

        <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar">
        <button class="button"><a href="indexprofessor.php">Voltar</a></button>
     </div> 
    </form>


    </div>
  </div>
</body>

</html>

</html>