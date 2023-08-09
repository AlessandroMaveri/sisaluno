<?php

define('SERVER', '10.70.230.53:3306'); //servidor
define('USUARIO', 'sisaluno'); //usuario
define('SENHA', 'sisaluno2023'); //senha da conexão
define('DBNAME', 'sisaluno'); //nome da database


try {

$conexao = new pdo('mysql:host=' . SERVER . ';dbname=' .
                                 DBNAME, USUARIO, SENHA);
} catch (PDOException $e) {
echo "Erro: Conexão com banco de dados não foi realizada com sucesso.
 Erro gerado " . $e->getMessage();
}

?>