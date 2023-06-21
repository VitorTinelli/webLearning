<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db('industria');

?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerenciar Clientes </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <script>

        function obterDadosModal(valor) {

            var retorno = valor.split("*");

            document.getElementById('cod').value = retorno[0];
            document.getElementById('nome').value = retorno[1];
            document.getElementById('endereco').value = retorno[2];
            document.getElementById('cidade').value = retorno[3];
            document.getElementById('estado').value = retorno[4];
            document.getElementById('telefone').value = retorno[5];

        }
    </script>

    <div class="modal fade" id="myModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Cadastrar Cliente:</h1>
                </div>
                <div class="modal-body">
                    <!--- Modal com form para se fazer cadastro  -->
                    <form class="form-group well" action="clientes.php" method="POST">
                        <input type="text" name="nome" class="span3" value="" required placeholder="Nome"
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" name="endereco" class="span3" value="" required placeholder="endereco"
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" name="cidade" class="span3" value="" required placeholder="cidade"
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" name="estado" class="span3" value="" required placeholder="estado"
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" name="telefone" class="span3" value="" required placeholder="telefone"
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
                    <form class="form-group well" action="clientes.php" method="POST">
                        Código<br> <input id="cod" type="text" name="cod" value="" readonly><br><br>
                        Nome<br> <input id="nome" type="text" name="nome" class="span3" required value=""
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Endereco<br> <input id="endereco" type="text" name="endereco" class="span3" required value=""
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Cidade<br> <input id="cidade" type="text" name="cidade" class="span3" required value=""
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Estado<br> <input type="text" id="estado" name="estado" class="span3" value="" required
                            style=" margin-bottom: -2px; height: 25px;"><br><br>
                        Telefone<br> <input type="text" id="telefone" name="telefone" class="span3" value="" required
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
                    <h1>Excluir Clientes:</h1>
                </div>
                <div class="modal-body">
                    <!--- Modal com form para excluir -->
                    <form class="form-group well" action="clientes.php" method="POST">
                        Insira o código do cliente:<br>
                        <input id="cod" type="text" name="cod" value="" required><br><br>
                        <button type="submit" class="btn btn-danger" name="excluir"
                            style="height: 35px">Excluir</button><br><br><br>
                        <table border="1px" bordercolor="#F5F5F5" class="table ">
                            <tr>
                                <td><b>Código</b></td>
                                <td><b>Nome</b></td>
                                <td><b>Endereco</b></td>
                                <td><b>Cidade</b></td>
                                <td><b>Estado</b></td>
                                <td><b>Telefone</b></td>
                            </tr>
                            <?php
                         $consulta = "select cod,nome,endereco, cidade, estado, telefone from clientes";
                         $resultado = mysql_query($consulta);
                        while ($dados = mysql_fetch_array($resultado))
                        {
                        $strdados = $dados['cod'] . "*" .  $dados['nome'] . "*" . $dados['endereco'] . "*" . $dados['cidade'] .  "*" . $dados['estado'] .  "*" . $dados['telefone'];
                        ?>
                            <tr>
                                <td>
                                    <?php echo $dados['cod']; ?>
                                </td>
                                <td>
                                    <?php echo $dados['nome']; ?>
                                </td>
                                <td>
                                    <?php echo $dados['endereco']; ?>
                                </td>
                                <td>
                                    <?php echo $dados['cidade']; ?>
                                </td>
                                <td>
                                    <?php echo $dados['estado']; ?>
                                </td>
                                <td>
                                    <?php echo $dados['telefone']; ?>
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

            <h2>Clientes: </h2><br>
            <form action="clientes.php" method="POST">
                <input type="text" name="nome" placeholder="Nome:" class="span4"
                    style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                    <button type="button" name="cadastrar" class="btn btn-success btn-large" data-toggle="modal"
                        data-target="#myModalCadastrar">Cadastrar</button>
                </a>
                <a href="#myModalExcluir" onclick="obterDadosModal('<?php echo $strdados ?>')">
                    <button type='button' id='excluir' name='excluir' class='btn btn-danger' data-toggle='modal'
                        data-target='#myModalExcluir'>Excluir</button>
                </a>
            </form>
            <table border="1px" bordercolor="#FCFCFC" class="table ">
                <tr>
                    <td><b>Código</b></td>
                    <td><b>Nome</b></td>
                    <td><b>Endereco</b></td>
                    <td><b>Cidade</b></td>
                    <td><b>Estado</b></td>
                    <td><b>Telefone</b></td>
                    <td><b>Gerenciar</b></td>
                </tr>
                <?php

                  if (isset($_POST['cadastrar']))
                {
                    $nome  = $_POST['nome'];
                    $endereco = $_POST['endereco'];
                    $cidade = $_POST['cidade'];
                    $estado = $_POST['estado'];
                    $telefone = $_POST['telefone'];

                    $busca = mysql_query("SELECT * FROM clientes WHERE nome = '$nome'");
                    $resultadoBusca = mysql_num_rows($busca);

                    if($resultadoBusca == 0) {
                        $sql = "insert into clientes (nome, endereco, cidade, estado, telefone)
                        values ('$nome','$endereco','$cidade', '$estado', '$telefone')";
                        $resultado = mysql_query($sql);
                    } else {
                        ?>
                <script>
                    window.alert("Cliente já cadastrado!")
                </script>
                <?php
                    }

                }
                if (isset($_POST['alterar']))
                {
                    $cod   = $_POST['cod'];
                    $nome  = $_POST['nome'];
                    $endereco = $_POST['endereco'];
                    $cidade = $_POST['cidade'];
                    $estado = $_POST['estado'];
                    $telefone = $_POST['telefone'];

                    $sql = "update clientes set nome = '$nome', endereco = '$endereco', cidade = '$cidade', estado = '$estado', telefone = '$telefone'
                            where cod = '$cod'";
                    $resultado = mysql_query($sql);
                }
                if (isset($_POST['excluir']))
                {
                    $cod   = $_POST['cod'];
                    
                    $sql = "delete from clientes where cod = '$cod'";
                    $resultado = mysql_query($sql);
                }

                if (isset($_POST['pesquisar']))
                {
                   $nome   = strtoupper($_POST['nome']);    

                   $consulta = "select cod,nome,endereco,cidade, estado, telefone from clientes
                                where UPPER(nome) like '%$nome%'";

                   $resultado = mysql_query($consulta);
                }

                else
                {
                    $consulta = "select cod,nome,endereco, cidade, estado, telefone from clientes";
                    $resultado = mysql_query($consulta);
                }

                while ($dados = mysql_fetch_array($resultado))
                {
                    $strdados = $dados['cod'] . "*" .  $dados['nome'] . "*" . $dados['endereco'] . "*" . $dados['cidade'] .  "*" . $dados['estado'] .  "*" . $dados['telefone'];
                ?>
                <tr>
                    <td>
                        <?php echo $dados['cod']; ?>
                    </td>
                    <td>
                        <?php echo $dados['nome']; ?>
                    </td>
                    <td>
                        <?php echo $dados['endereco']; ?>
                    </td>
                    <td>
                        <?php echo $dados['cidade']; ?>
                    </td>
                    <td>
                        <?php echo $dados['estado']; ?>
                    </td>
                    <td>
                        <?php echo $dados['telefone']; ?>
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