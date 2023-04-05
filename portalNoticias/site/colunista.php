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
        <link rel="stylesheet" type= "text/css" href="style1.css">
    </head>


    <body>
        <div>
        <form name="formulario" method="post" action="regiao.php">
            <div id="form">
                <h2> Cadastro de colunistas</h2>

                <div >
                    <input type="text" name="nome" id="nome" size=20 
                    <label for="nome">Nome: </label>
                </div>

                <div >
                    <input type="text" name="email" id="email" size=20 
                    <label for="email">Email: </label>
                </div>

                <div >
                    <input type="text" name="user" id="user" size=20 
                    <label for="user">Usuário: </label>
                </div>

                <div >
                    <input type="text" name="senha" id="senha" size=20 
                    <label for="senha">Senha: </label>
                </div>



                <div>
                <!-- Botões -->
                <input type="submit" name="gravar" id="gravar" value="Enviar">
                <input type="submit" name="alterar" id="alterar" value="Alterar">
                <input type="submit" name="excluir" id="excluir" value="Excluir">
                <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">

                </div>
                </div> 
            <div>
                <?php
                    //Se clicar no botão gravar
                    if (isset($_POST['gravar'])){
                        //receber as variaveis do HTML:
                        $codigo = $_POST['codigo'];
                        $nome   = $_POST['nome'];

                        //comando do SQL (INSERT):
                        $sql = "insert into regiao (codigo, nome) 
                                values ('$codigo', '$nome')";

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

                        $codigo = $_POST['codigo'];
                        $nome   = $_POST['nome'];

                        //
                        $sql = "update regiao set nome = '$nome' 
                                where codigo = '$codigo'";

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
                        $codigo = $_POST['codigo'];
                        $nome   = $_POST['nome'];

                        $sql = "delete from regiao
                                where codigo = '$codigo' or nome = '$nome'";

                        $resultado = mysql_query($sql);
                        if ($resultado){
                            echo "Dados excluidos com sucesso.";
                        }
                        else{
                            echo "Erro ao excluir dados.";
                        }
                    }

                    if (isset($_POST['pesquisar'])){
                        $codigo = $_POST['codigo'];
                        $nome   = $_POST['nome'];

                        $sql = "select * from regiao";

                        $resultado = mysql_query($sql);

                        if (mysql_num_rows($resultado) == 0){
                            echo "Desculpe, sua pesquisa não encontrou resultados.";
                        }
                        else{
                            echo "Resultado da pesquisa por regiao:"."<br><br>";
                            while ($regiao = mysql_fetch_array($resultado)){
                                echo "Codigo: ".$regiao['codigo']."<br>";
                                echo "Nome: ".$regiao ['nome']."<br><br>";
                            }
                        }
                    }
                ?>
            </div>
            </div>
        </form>
        
    </body>
</html>