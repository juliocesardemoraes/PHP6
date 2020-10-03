<?php
    session_start();
    require_once('variaveis.php');
    require_once('conexao.php');

    $nomePessoa  = "";
    $numeroPessoa = 0;
    $datanascPessoa = "";
    $cepPessoa  = "";
    $telefonePessoa   = "";
    $emailPessoa   = "";
    $idPessoa = -1;
    $complementoPessoa = "";
    $cidadePessoa = "";
    $estadoPessoa = "";
    $celularPessoa = "";

    

    //Checa se o get existe
    //Se existir quer dizer que o usuario está editando
    //if(isset($_GET['idPessoa'])){
      
      
    $idPessoa = $_GET['idPessoa'];

    

    //Select com id
    $sql = "SELECT nome, numero, datanascimento, cep, telefone, email, complemento, cidade, estado, celular   FROM pessoas WHERE idPessoa =" .$idPessoa;
    $resp = mysqli_query($conexao_bd, $sql);
    if($resp){
      if($rows=mysqli_fetch_row($resp)){
        $nomePessoa = $rows[0];      
        $numeroPessoa = $rows[1];
        $datanascPessoa = $rows[2];
        $cepPessoa  = $rows[3];
        $telefonePessoa   = $rows[4];
        $emailPessoa   = $rows[5];
        $complementoPessoa = $rows[6];
        $cidadePessoa = $rows[7];
        $estadoPessoa = $rows[8];
        $celularPessoa = $rows[9];
      }  
    }

   //recuperando dados da sessao
    $id_usuario   = $_SESSION["id_usuario"];
    $tipoAcesso   = $_SESSION["tipo_acesso"];    
    $nome_usuario = "";
    
    $sql = "SELECT nome FROM usuarios WHERE id = ".$id_usuario;
    $resp = mysqli_query($conexao_bd, $sql);
    if($rows=mysqli_fetch_row($resp)){
        $nome_usuario = $rows[0];
    }
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - Editar Pacientes</title>
   <link rel="icon" href="img/favicon/favicon2.ico">
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   
</head>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
</script>
<body>
   <div class="container">
   <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="#">SysPacientes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php 
            if($tipoAcesso != 3) {
            ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                  <a class="dropdown-item" href="pessoas_list.php">Cadastro de pessoas</a>
                  <a class="dropdown-item" href="usuario_list2.php">Cadastro de usuários</a>                
                  <a class="dropdown-item" href="#">Cadastro de pacientes</a>
                </div>
              </li>
            <?php
            }
            ?>
          </ul>  
          <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo($nome_usuario); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                <a class="dropdown-item" href="minhaconta.php">Minha conta</a>
                <a class="dropdown-item" href="logout.php">Sair</a>                 
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <?php
            echo("<h1>Edição ou cadastro de nova pessoa:</h1>");
        ?>
        <form
            method="post"
            action="pessoa_gravar.php">
            <div class="form-group">
               <label for="inputNome">Nome da Pessoa:</label>
               <input type="text" class="form-control" id="inputNome" 
                     name="inputNome" placeholder="Nome do usuário" maxlength="100"
                     value="<?php echo($nomePessoa ); ?>" required>
            </div>

            <div class="form-group">
               <label for="inputNumero">Numero do endereco:</label>
                    <input type="number" name="inputNumero" class="form-control" id="inputNumero" min="0"  value="<?php echo($numeroPessoa ); ?>" required
                    data-bind="value:replyNumber" />
            </div>

            <div class="form-group">
               <label for="inputEmail">E-mail:</label>
                   <input id="inputEmail" name="inputEmail" class="form-control" data-inputmask="'alias': 'email'" value="<?php echo($emailPessoa ); ?>" required > 
            </div>
            <div class="form-group">
                <label for="inputData">Data de nascimento:</label>
                <input type="text"  name="inputData" data-inputmask="'alias': 'date'" class="form-control item" id="inputData" value="<?php echo($datanascPessoa ); ?> " required
                />
            </div>   
            
            <div class="form-group">
               <label for="inputCep">CEP:</label>
               <input type="text" class="form-control" id="inputCep" 
                        name="inputCep" placeholder="00000-000"
                        value="<?php echo($cepPessoa); ?>"
                        required>
            </div>
            <div class="form-group">
                    <label for="inputTel">Telefone:</label> 
                    <input class="form-control" name="inputTel" id="inputTel" 
                    value="<?php echo($telefonePessoa); ?>" data-inputmask="'alias': 'phonebe'" 
                    required> 
            </div>
            <div class="form-group">
                    <label for="inputComplemento">Complemento:</label> 
                    <input class="form-control" name="inputComplemento" id="inputComplemento" 
                    value="<?php echo($complementoPessoa); ?>"> 
            </div>
            <div class="form-group">
                    <label for="inputCidade">Cidade:</label> 
                    <input class="form-control" name="inputCidade" id="inputCidade" 
                    value="<?php echo($cidadePessoa); ?>" required> 
            </div>
            <div class="form-group">
                    <label for="inputEstado">Estado:</label> 
                    <input class="form-control" name="inputEstado" id="inputEstado" 
                    value="<?php echo($estadoPessoa); ?>" required> 
            </div>
            <div class="form-group">
                    <label for="inputCelular">Celular:</label> 
                    <input class="form-control" name="inputCelular" id="inputCelular" 
                    value="<?php echo($celularPessoa); ?>" data-inputmask="'alias': 'phonebe'" > 
            </div>
            
                   
            <input type="hidden" id="inputIdPessoa" name="inputIdPessoa" value="<?php echo($idPessoa) ?>">

            <button type="submit" class="btn btn-success">Gravar</button>&nbsp;
           
            <a href="pessoas_list.php" class="btn btn-warning" role="button">Retornar</a>
       
         </form>
      </div>
    </div>



</body>
<?php
//encerrando a conexao com mysql
mysqli_close($conexao_bd);
?>
<script>
    $(document).ready(function(){
        $(":input").inputmask();



        $("#inputTel").inputmask({
        mask: '(99) 9999-9999',
        placeholder: ' ',
        showMaskOnHover: false,
        showMaskOnFocus: false,
        onBeforePaste: function (pastedValue, opts) {
        var processedValue = pastedValue;

        //do something with it

        return processedValue;
        }
        });
       
        $("#inputCep").inputmask({
        mask: '99999-000',
        placeholder: ' ',
        showMaskOnHover: false,
        showMaskOnFocus: false,
        onBeforePaste: function (pastedValue, opts) {
        var processedValue = pastedValue;

        //do something with it

        return processedValue;
        }
        });
       
        $("#inputCelular").inputmask({
        mask: '(99) 99999-9999',
        placeholder: ' ',
        showMaskOnHover: false,
        showMaskOnFocus: false,
        onBeforePaste: function (pastedValue, opts) {
        var processedValue = pastedValue;

        //do something with it

        return processedValue;
        }
        });
    });
</script>

</html>