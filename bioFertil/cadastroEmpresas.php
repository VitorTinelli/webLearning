<?php
//conectar com o servidor: localhost,root,""
$servidor = mysqli_connect('localhost','root','', 'biofertil') ;
?>

<html>
    <!-- Head -->
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastro</title>
        <link rel="stylesheet" type= "text/css" href="styles.css">
        <html lang="pt-br">
    </head>


    <body>
    <div>
        <form name="formulario" method="post" action="cadastroEmpresas.php" enctype="multipart/form-data">
            <div id="form">
                <h2> Cadastro</h2>

                <div class="input-forms">
                    <input required type="text" name="nome" id="nome" size=20 class="input"> 
                    <label for="nome">Nome do estabelecimento: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="user" id="user" size=20 class="input"> 
                    <label for="user">Username (Login): </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="cnpj" id="cnpj" size=20 class="input">
                    <label for="cnpj">CNPJ: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="endereco" id="endereco" size=20 class="input">
                    <label for="endereco">Endereço: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="cidade" id="cidade" size=20 class="input">
                    <label for="cidade">Cidade: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="estado" id="estado" size=20 class="input">
                    <label for="estado">Estado (RS/SC/PR): </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="telefone" id="telefone" size=20 class="input">
                    <label for="telefone">Telefone: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="senha" id="senha" size=20 class="input">
                    <label for="senha">Senha: </label>
                </div>
                
                <div>
                <!-- Botões -->
                <input type="submit" name="gravar" id="gravar" value="Registrar-se" class = "buttons">
                </div>

            </form> 
        </div>
            <div>
                <?php
                    //Se clicar no botão gravar
                    if (isset($_POST['gravar'])){
                        //receber as variaveis do HTML:
                        $nome = $_POST['nome'];
                        $user = $_POST['user'];
                        $cnpj = $_POST{'cnpj'};
                        $endereco = $_POST['endereco'];
                        $cidade = $_POST['cidade'];
                        $estado = $_POST['estado'];
                        $telefone = $_POST['telefone'];
                        $senha = $_POST['senha'];
                        
                        //comando do SQL (INSERT):
                        $sql = "insert into usuarios (nome, user, cnpj, endereco, cidade, estado, telefone, senha)
                                values ('$nome', '$user', '$cnpj', '$endereco', '$cidade', '$estado', '$telefone', '$senha')";

                        //validar o comando no banco de dados:
                        $resultado = mysqli_query($servidor, $sql);

                        //verificar se gravou no banco ou ocorreu erro:
                        if ($resultado){
                            echo "Dados gravados com sucesso.";
                            header("Location: login.php");   }
                        
    }                  else{
                            echo "Erro ao gravar dados.";
                        }
                    }
                ?>
            </div>
            </div>
        </form>
        
    </body>
</html>