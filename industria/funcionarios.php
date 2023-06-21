<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db('industria');

?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerenciar Funcionário </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <script>
        function obterDadosModal(valor) {
            var retorno = valor.split("*");
            document.getElementById('cod').value = retorno[0];
            document.getElementById('nome').value = retorno[1];
            document.getElementById('login').value = retorno[2];
            document.getElementById('senha').value = retorno[3];
        }
    </script>

    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Cadastrar Funcionário:</h1>
                </div>
                <div class="modal-body">
                    <!--- Modal com form para se fazer cadastro  -->
                    <form class="form-group well" action="funcionarios.php" method="POST">
                        <input type="text" name="nome" class="span3" value="" required placeholder="Nome"
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" name="login" class="span3" value="" required placeholder="Login"
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" name="senha" class="span3" value="" required placeholder="Senha"
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-success btn-large" name="cadastrar"
                            style="height: 35px">Cadastrar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <!--Modal Alterar-->
    <div class="modal fade" id="myModalAlterar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h1>Alterar Dados:</h1>
                </div>
                <div class="modal-body">
                    <!--- Modal com form para se fazer alteracao -->
                    <form class="form-group well" action="funcionarios.php" method="POST">
                        Código<br> <input id="cod" type="text" name="cod" value="" readonly><br><br>
                        Nome<br> <input id="nome" type="text" name="nome" class="span3" required value=""
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Login<br> <input id="login" type="text" name="login" class="span3" required value=""
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Senha<br> <input id="senha" type="text" name="senha" class="span3" required value=""
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-primary" name="alterar"
                            style="height: 35px">Alterar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Excluir-->
    <div class="modal fade" id="myModalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h1>Excluir Funcionário:</h1>
                </div>
                <div class="modal-body">
                    <!--- Modal com form para excluir -->
                    <form class="form-group well" action="funcionarios.php" method="POST">
                        <table border="1px" bordercolor="#F5F5F5" class="table ">
                            Digite o código:<br>
                            <input id="cod" type="text" name="cod" value=""><br><br>
                            <button type="submit" class="btn btn-danger" name="excluir"
                                style="height: 35px">Excluir</button><br><br><br>
                            <tr>
                                <td><b>Código</b></td>
                                <td><b>Nome</b></td>
                                <td><b>Login</b></td>
                                <td><b>Senha</b></td>
                            </tr>
                            <?php
                         $consulta = "select * from funcionarios";
                         $resultado = mysql_query($consulta);
                            while ($dados = mysql_fetch_array($resultado))
                            {
                            $strdados = $dados['cod'] . "*" .  $dados['nome'] . "*" . $dados['login'] . "*" . $dados['senha'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $dados['cod']; ?>
                                </td>
                                <td>
                                    <?php echo $dados['nome']; ?>
                                </td>
                                <td>
                                    <?php echo $dados['login']; ?>
                                </td>
                                <td>
                                    <?php echo $dados['senha']; ?>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <h2>Funcionários: </h2><br>
            <form action="funcionarios.php" method="POST">
                <input type="text" name="nome" placeholder="Nome:" class="span4"
                    style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                    <button type="button" name="cadastrar" class="btn btn-success btn-large" data-toggle="modal"
                        data-target="#myModalCadastrar">Cadastrar</button></a>
                <a href="#myModalExcluir" onclick="obterDadosModal('<?php echo $strdados ?>')">
                    <button type='button' id='excluir' name='excluir' class='btn btn-danger' data-toggle='modal'
                        data-target='#myModalExcluir'>Excluir</button>
                </a>
            </form>
            <table border="1px" bordercolor="#FCFCFC" class="table ">
                <tr>
                    <td><b>Código</b></td>
                    <td><b>Nome</b></td>
                    <td><b>Login</b></td>
                    <td><b>Senha</b></td>
                    <td><b>Gerenciar</b></td>
                </tr>
                <?php

                  if (isset($_POST['cadastrar']))
                {
                    $nome  = $_POST['nome'];
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];

                    $busca = mysql_query("SELECT * FROM funcionarios WHERE nome = '$nome' OR login = '$login'");
                    $resultadoBusca = mysql_num_rows($busca);

                    if($resultadoBusca == 0) {
                        $sql = "insert into funcionarios (nome, login, senha)
                        values ('$nome','$login','$senha')";
                        $resultado = mysql_query($sql);
                    } else {
                        ?>
                <script>
                    window.alert("Funcionário já cadastrado!")
                </script>
                <?php
                    }

                }
                if (isset($_POST['alterar']))
                {
                    $cod   = $_POST['cod'];
                    $nome  = $_POST['nome'];
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];

                    $sql = "update funcionarios set nome = '$nome', login = '$login', senha = '$senha'
                            where cod = '$cod'";
                    $resultado = mysql_query($sql);
                }
                if (isset($_POST['excluir']))
                {
                    $cod   = $_POST['cod'];
                    $nome  = $_POST['nome'];
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];

                    $sql = "delete from funcionarios where cod = '$cod'";
                    $resultado = mysql_query($sql);
                }

                if (isset($_POST['pesquisar']))
                {
                   $nome   = strtoupper($_POST['nome']);    // converter maiuscula

                   $consulta = "select cod,nome,login,senha from funcionarios
                                where UPPER(nome) like '%$nome%'";

                   $resultado = mysql_query($consulta);
                }
                else
                {
                    $consulta = "select cod,nome,login,senha from funcionarios";
                    $resultado = mysql_query($consulta);
                }

                while ($dados = mysql_fetch_array($resultado))
                {
                    $strdados = $dados['cod'] . "*" .  $dados['nome'] . "*" . $dados['login'] . "*" . $dados['senha'];
                ?>
                <tr>
                    <td>
                        <?php echo $dados['cod']; ?>
                    </td>
                    <td>
                        <?php echo $dados['nome']; ?>
                    </td>
                    <td>
                        <?php echo $dados['login']; ?>
                    </td>
                    <td>
                        <?php echo $dados['senha']; ?>
                    </td>
                    <td>

                        <a href="#myModalAlterar" onclick="obterDadosModal('<?php echo $strdados ?>')">
                            <button type='button' id='alterar' name='alterar' class='btn btn-primary'
                                data-toggle='modal' data-target='#myModalAlterar'>Alterar</button>
                        </a>

                    </td>
                </tr>
                <?php
                }
                mysql_close($conectar);
                ?>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>