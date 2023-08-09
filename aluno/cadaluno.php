<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylecadaluno.css">
  <title>Document</title>
</head>

<body>

  <div class="fundo">
    <div class="planodefundo">
      <form method="GET" action="crudaluno.php" class="form-cadastro">

        <div class="preenchimento-dados">
          <label for="nome">Nome:
          <input type="text" name="nome" id="um" required></label>
        
        <label for="idade">Idade:
        <input type="number" name="idade" id="um" min="0" required>
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
        
  <label for="datanascimento">datanascimento:
        <input type="date" name="datanascimento" id="um" required></label>

        <label for="endereco">Endereço:
        <input type="text" name="endereco" id="um" required></label>
      </div>
      <div class="datanascimento">


          <label for="estatus">Aluno está aprovado</label>
        <label for="radiov">Verdadeiro</label>
        <input type="radio" id="radiov" required  name="estatus" value="AP">
        
        <label for="radioF">Falso</label>
        <input type="radio" id="radioF"required name="estatus" value="RP">

      </div>
<div class="sbutton">
        <input type="submit" name="cadastrar" value="Cadastrar" id="cadastrar">

        
        <button class="button"><a href="indexaluno.php">Voltar</a></button>
     </div> 
    </form>
    


    </div>
  </div>
</body>

</html>

</html>
