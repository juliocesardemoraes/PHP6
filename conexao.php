<?php
   $conexao_bd = mysqli_connect(
                  "localhost:8800",
                  "root",
                  "jcmcf100584",
                  "syspacientes");
   if(!$conexao_bd){
      echo "Não foi possível conectar no banco de dados: ";
      exit;
   }
   
   //echo "conectou!";
?>