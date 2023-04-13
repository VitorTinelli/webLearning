<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: portal
$banco = mysql_select_db('portal');
?>

<html>
    <!-- Head -->
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastro de Colunistas</title>
        <link rel="stylesheet" type= "text/css" href="css/styles.css">
    </head>


    <body>
        <div>
        <form name="formulario" method="post" action="colunista.php">
            <div id="form">
                <h2> Cadastro de colunistas</h2>

                <div class="input-forms">
                    <input required type="text" name="nome" id="nome" size=20 class="input">
                    <label for="nome">Nome: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="email" id="email" size=20 class="input"> 
                    <label for="email">Email: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="login" id="login" size=20 class="input">
                    <label for="login">Usuário: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="senha" id="senha" size=20 class="input">
                    <label for="senha">Senha: </label>
                </div>



                <div>
                <!-- Botões -->
                <input type="submit" name="gravar" id="gravar" value="Enviar" class = "buttons">
                <input type="submit" name="alterar" id="alterar" value="Alterar" class = "buttons">
                <input type="submit" name="excluir" id="excluir" value="Excluir" class = "buttons">
                <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar" class = "buttons">

                </div>
                </div> 
            <div>
                <?php
                    //Se clicar no botão gravar
                    if (isset($_POST['gravar'])){
                        //receber as variaveis do HTML:
                        $nome   = $_POST['nome'];
                        $email  = $_POST['email'];
                        $login  = $_POST['login'];
                        $senha  = $_POST['senha'];

                        //comando do SQL (INSERT):
                        $sql = "insert into colunistas (nome, email, login, senha) 
                                values ('$nome', '$email', '$login', '$senha')";
                                
                        //validar o comando no banco de dados:
                        $resultado = mysql_query($sql);

                        //verificar se gravou no banco ou ocorreu erro:
                        if ($resultado){
                            echo "Dados gravados com sucesso.";
                        }
                        else{
                            echo "Erro ao gravar dados.";
                        }
                    }

                    //Se clicar no botão alterar
                    if (isset($_POST['alterar'])){

                        $nome   = $_POST['nome'];
                        $email  = $_POST['email'];
                        $login  = $_POST['login'];
                        $senha  = $_POST['senha'];

                        //
                        $sql = "update colunistas set senha = '$senha' 
                                where email = '$email'";

                        $resultado = mysql_query($sql);
                        if ($resultado){
                            echo "Dados alterados com sucesso.</div>";
                        }
                        else{
                            echo "Erro ao alterar dados.</div>";
                        }
                    }

                    //Se clicar no botão excluir
                    if (isset($_POST['excluir'])){

                        $nome   = $_POST['nome'];
                        $email  = $_POST['email'];
                        $login  = $_POST['login'];
                        $senha  = $_POST['senha'];

                        $sql = "delete from colunistas
                                where email = '$email' and senha = '$senha'";

                        $resultado = mysql_query($sql);
                        if ($resultado){
                            echo "Dados excluidos com sucesso.";
                        }
                        else{
                            echo "Erro ao excluir dados.";
                        }
                    }

                    if (isset($_POST['pesquisar'])){
                       
                        $nome   = $_POST['nome'];
                        $email  = $_POST['email'];
                        $login  = $_POST['login'];
                        $senha  = $_POST['senha'];

                        $sql = "select * from colunistas";

                        $resultado = mysql_query($sql);

                        if (mysql_num_rows($resultado) == 0){
                            echo "Desculpe, sua pesquisa não encontrou resultados.";
                        }
                        else{
                            echo "Resultado da pesquisa por colunistas:"."<br><br>";
                            while ($colunistas = mysql_fetch_array($resultado)){
                                echo "Codigo: ".$colunistas['codigo']."<br>";
                                echo "Email: ".$colunistas['email']."<br>";
                                echo "Nome: ".$colunistas ['nome']."<br><br>";
                            }
                        }
                    }
                ?>
            </div>
            </div>
        </form>
        
    </body>
</html>