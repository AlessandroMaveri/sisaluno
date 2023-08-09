<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylecaddisciplina.css">
  <title>Document</title>
</head>

<body>

  <div class="fundo">
    <div class="planodefundo">
      <form method="GET" action="cruddisciplina.php" class="form-cadastro">

        <div class="preenchimento-dados">
          <label for="nomedi">Nome Disciplina:
          <input type="text" name="nomedisciplina" id="um" required></label>
        
        <label for="ch">Carga Horaria:
        <input type="number" name="ch" id="um" min="0" required>
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

<div class="semestre2">
        <label for="semestre">Selecione o semestre:</label>
<select id="dois" name="semestre" required>
<option value="0"></option>
  <option value="1º">1º Semestre</option>
  <option value="2º">2º Semestre</option>
  <option value="3º">3º Semestre</option>
  <!-- Adicione mais opções conforme necessário -->
</select>
</div>
        <label for="idprofessor">ID professor:
        <input type="text" name="idprofessor" id="um"  minlength="1" maxlength="3" min="0" required>
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
      
<div class="sbutton">
        <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar">
        <button class="button"><a href="indexdisciplina.php">Voltar</a></button>
     </div> 
    </form>
    


    </div>
  </div>
</body>

</html>

</html>