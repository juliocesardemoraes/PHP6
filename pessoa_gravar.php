<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');
   
   
   $id_pessoa = $_POST["inputIdPessoa"];
  

   $nome = $_POST["inputNome"];
   $numero = $_POST["inputNumero"];
   $datanasc  = $_POST["inputData"];
   $cep = $_POST["inputCep"];
   $telefone  = $_POST["inputTel"];
   $email = $_POST["inputEmail"];
   $complemento = $_POST["inputComplemento"];
   $cidade = $_POST["inputCidade"];
   $estado = $_POST["inputEstado"];
   $celular = $_POST["inputCelular"];
   
      if($id_pessoa){
         //atualizar
         $sql = "UPDATE pessoas SET 
                  nome='$nome', 
                  email='$email', 
                  numero='$numero',
                  datanascimento= '$datanasc',
                  cep = '$cep',
                  telefone = '$telefone',
                  complemento = '$complemento',
                  cidade = '$cidade',
                  estado = '$estado',
                  celular = '$celular'
               WHERE idPessoa = $id_pessoa";
      }else{
         //insert
         $sql = "INSERT INTO pessoas( nome, email, numero, datanascimento, cep, telefone, complemento, cidade, estado, celular)
                               VALUES('$nome', '$email','$numero','$datanasc','$cep','$telefone', '$complemento', '$cidade', '$estado', '$celular' ) 
                               ";
      }

   mysqli_query($conexao_bd, $sql);
   mysqli_close($conexao_bd);
   header("location:pessoas_list.php");
   echo $sql;
   
?>