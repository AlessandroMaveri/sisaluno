<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylelistaalunos.css">

    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
  require_once('../conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM aluno');
  $retorno->execute();

?>      <div class="topo"></div>
<div class="nome">LISTA ALUNO</div>
<div class="tabela">
    
        <table> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>IDADE</th>
                    <th>ENDEREÇO</th>
                    <th>DATA NASCIMENTO</th>
                    <th>ESTATUS</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                            <td> <?php echo $value['id'] ?>   </td> 
                            <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['idade']?> </td> 
                            <td> <?php echo $value['endereco']?> </td> 
                            <td> <?php echo $value['datanascimento']?> </td>
                            <td> <?php                                             if ($value['estatus'] == "AP") {
                                                $imp = "Aprovado";
                                                echo "$imp";
                                            } else {
                                                $value['estatus'] == "RP";
                                                $imp = "Reprovado";
                                               echo "$imp";

                                            }
                                           ?> </td> 


                            <td class="layoutbotao">
                               <form method="POST" action="altaluno.php">
                                    <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                    <input name="nome" type="hidden" value="<?php echo $value['nome'];?>"/> 
                                    <input name="idade" type="hidden" value="<?php echo $value['idade'];?>"/>
                                    <input name="endereco" type="hidden" value="<?php echo $value['endereco'];?>"/>
                                    <input name="datanascimento" type="hidden" value="<?php echo $value['datanascimento'];?>"/>
                                    <input name="estatus" type="hidden" value="<?php echo $value['estatus'];
                                    ?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td>

                             <td class="layoutbotao">
                               <form method="GET" action="crudaluno.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="excluir"  type="submit">Excluir</button>
                                </form>

                             </td> 


                       
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
        </table>
        
                    </div>
<?php         
   echo "<button class='button button3'><a href='indexaluno.php'>voltar</a></button>";
?>
