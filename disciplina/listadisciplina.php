<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylelistadisciplina.css">

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
   
  $retorno = $conexao->prepare('SELECT * FROM disciplina');
  $retorno->execute();

?>      <div class="topo"></div>
<div class="nome">LISTA DISCIPLINA</div>
<div class="tabela">
    
        <table> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME DISCIPLINA</th>
                    <th>CARGA HORARIA</th>
                    <th>SEMESTRE</th>
                    <th>ID PROFESSOR</th>
                    
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                            <td> <?php echo $value['id'] ?>   </td> 
                            <td> <?php echo $value['nomedisciplina']?>  </td> 
                            <td> <?php echo $value['ch']?> </td> 
                
                            <td> <?php echo $value['semestre']?> </td> 
                            <td> <?php echo $value['idprofessor']?> </td>
                            


                            <td class="layoutbotao">
                               <form method="POST" action="altdisciplina.php">
                                    <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                    <input name="nome" type="hidden" value="<?php echo $value['nomedisciplina'];?>"/> 
                                    <input name="ch" type="hidden" value="<?php echo $value['ch'];?>"/>
                                    <input name="semestre" type="hidden" value="<?php echo $value['semestre'];?>"/>
                                    <input name="idprofessor" type="hidden" value="<?php echo $value['idprofessor'];?>"/>
                    
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td>

                             <td class="layoutbotao">
                               <form method="GET" action="cruddisciplina.php">
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
   echo "<button class='button button3'><a href='indexdisciplina.php'>voltar</a></button>";
?>