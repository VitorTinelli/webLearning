<?php
$conectar               = mysql_connect('localhost','root','');
$banco                  = mysql_select_db('industria');

$sql_clientes           = "Select * from clientes";
$pesquisar_clientes     = mysql_query($sql_clientes);

$sql_funcionarios       = "Select * from funcionarios";
$pesquisar_funcionarios = mysql_query($sql_funcionarios);

$sql_produtos           = "Select * from produtos";
$pesquisar_produtos     = mysql_query($sql_produtos); 
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerenciar Pedidos </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <script>
        
        function obterDadosModal(valor) {

            var retorno = valor.split("*");

            document.getElementById('cod').value   = retorno[0];
            document.getElementById('datapedido').value  = retorno[1];
            document.getElementById('codfunc').value = retorno[2];
            document.getElementById('codcli').value = retorno[3];
            document.getElementById('codprod').value = retorno[4];
            document.getElementById('quantidade').value = retorno[5];
            document.getElementById('preco').value = retorno[6];
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
                    <form class="form-group well" action="Pedidos.php" method="POST">
                        <input type="date" name="datapedido" id="datapedido" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <select name="codfunc" id="codfunc">
                        <option value = "0" selected disabled style=" margin-bottom: -2px; height: 25px;">Selecione o Funcionário</option>
                            <?php
                            if (mysql_num_rows($pesquisar_funcionarios) <> 0){
                                while ($funcionarios = mysql_fetch_array($pesquisar_funcionarios)){
                                    echo '<option value = "'.$funcionarios['cod'].'">'
                                                            .$funcionarios['nome'].'</option>';
                                }
                                echo '</select>';
                            }
                            ?> 
                        <br><br>
                        <select name="codcli" id="codcli">
                        <option value = "0" selected disabled style="margin-bottom: -2px; height: 25px;">Selecione o Cliente</option>
                            <?php
                            if (mysql_num_rows($pesquisar_clientes) <> 0){
                                while ($clientes = mysql_fetch_array($pesquisar_clientes)){
                                    echo '<option value = "'.$clientes['cod'].'">'
                                                            .$clientes['nome'].'</option>';
                                }
                                echo '</select>';
                            }
                            ?> 
                        <br><br>
                        <select name="codprod" id="codprod">
                        <option value = "0" selected disabled style="margin-bottom: -2px; height: 25px;">Selecione o Produto</option>
                            <?php
                            if (mysql_num_rows($pesquisar_produtos) <> 0){
                                while ($produtos = mysql_fetch_array($pesquisar_produtos)){
                                    echo '<option value = "'.$produtos['cod'].'">'
                                                            .$produtos['nome'].'</option>';
                                }
                                echo '</select>';
                            }
                            ?> 
                        <br><br>
                        <input type="text" name="quantidade" class="span3" value="" required placeholder="quantidade" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <input type="text" name="preco" class="span3" value="" required placeholder="preco" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-success btn-large" name="cadastrar" style="height: 35px">Cadastrar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalAlterar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h1>Alterar Dados:</h1>
                </div>
                <div class="modal-body">
                    <!--- Modal com form para se fazer alteracao -->
                    <form class="form-group well" action="Pedidos.php" method="POST">
                        Código<br>   <input id="cod" type="text" name="cod" value="" readonly><br><br>
                        datapedido<br>  <input id="datapedido" type="text" name="datapedido" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codfunc<br> <input id="codfunc" type="text" name="codfunc" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codcli<br> <input id="codcli" type="text" name="codcli" class="span3" required value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codprod<br> <input type="text"  id ="codprod" name="codprod" class="span3" value="" required style=" margin-bottom: -2px; height: 25px;"><br><br>
                        quantidade<br> <input type="text" id = "quantidade" name="quantidade" class="span3" value="" required style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-primary" name="alterar" style="height: 35px">Alterar</button>
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
                    <h1>Excluir Pedidos:</h1>
                </div>
                <div class="modal-body">
                    <!--- Modal com form para excluir -->
                    <form class="form-group well" action="Pedidos.php" method="POST">
                        Você tem certeza que deseja excluir o clinte?<br><br>
                        Codigo<br>   <input id="cod" type="text" name="cod" value="" readonly><br><br>
                        datapedido<br>  <input id="datapedido" type="text" name="datapedido" class="span3" readonly value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codfunc<br> <input id="codfunc" type="text" name="codfunc" class="span3" readonly value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codcli<br> <input id="codcli" type="text" name="codcli" class="span3" readonly value="" style=" margin-bottom: -2px; height: 25px;"><br><br>
                        codprod<br> <input id="codprod" type="text" name="codprod" class="span3" value="" readonly style=" margin-bottom: -2px; height: 25px;"><br><br>
                        quantidade<br> <input id="quantidade" type="text" name="quantidade" class="span3" value="" readonly style=" margin-bottom: -2px; height: 25px;"><br><br>
                        <button type="submit" class="btn btn-danger" name="excluir" style="height: 35px">Excluir</button>
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

            <h2>Pedidos: </h2><br>
            <form action="Pedidos.php" method="POST">
                <input type="text" name="datapedido" placeholder="datapedido:" class="span4" style="margin-bottom: -2px; height: 25px;">
                <button type="submit" name="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
                <a href="#myModalCadastrar">
                <button type="button" name="cadastrar" class="btn btn-success btn-large" data-toggle="modal" data-target="#myModalCadastrar">Cadastrar</button></a>
            </form>
            <table border="1px" bordercolor="#FCFCFC" class="table ">
                <tr>
                    <td><b>Código</b></td>
                    <td><b>Datapedido</b></td>
                    <td><b>Vendedor</b></td>
                    <td><b>Cliente</b></td>
                    <td><b>Produto</b></td>
                    <td><b>Quantidade</b></td>
                    <td><b>Preço</b></td>
                    <td><b>Total</b></td>
                    <td><b>Gerenciar</b></td>
                </tr>
                  <?php
                  if (isset($_POST['cadastrar']))
                {
                    $datapedido  = $_POST['datapedido'];
                    $codfunc = $_POST['codfunc'];
                    $codcli = $_POST['codcli'];
                    $codprod = $_POST['codprod'];
                    $quantidade = $_POST['quantidade'];
                    $preco = $_POST['preco'];


                    $busca = mysql_query("SELECT * FROM Pedidos WHERE datapedido = '$datapedido' and codfunc = '$codfunc' and codcli = '$codcli' and codprod = '$codprod' and quantidade = '$quantidade' and preco = '$preco'");
                    $resultadoBusca = mysql_num_rows($busca);

                    if($resultadoBusca == 0) {
                        $sql = "insert into Pedidos (datapedido, codfunc, codcli, codprod, quantidade, preco)
                        values ('$datapedido','$codfunc','$codcli', '$codprod', '$quantidade', '$preco')";
                        $resultado = mysql_query($sql);
                    } else {
                        ?>
                        <script>
                            window.alert("Pedido já cadastrado!")
                        </script>
                        <?php
                    }

                }
                if (isset($_POST['alterar']))
                {
                    $cod   = $_POST['cod'];
                    $datapedido  = $_POST['datapedido'];
                    $codfunc = $_POST['codfunc'];
                    $codcli = $_POST['codcli'];
                    $codprod = $_POST['codprod'];
                    $quantidade = $_POST['quantidade'];

                    $sql = "update Pedidos set datapedido = '$datapedido', codfunc = '$codfunc', codcli = '$codcli', codprod = '$codprod', quantidade = '$quantidade'
                            where cod = '$cod'";
                    $resultado = mysql_query($sql);
                }
                if (isset($_POST['excluir']))
                {
                    $cod   = $_POST['cod'];
                    
                    $sql = "delete from Pedidos where cod = '$cod'";
                    $resultado = mysql_query($sql);
                }

                if (isset($_POST['pesquisar']))
                {
                   $datapedido   = strtoupper($_POST['datapedido']);

                   $consulta = "select cod,datapedido,codfunc,codcli, codprod, quantidade, preco from Pedidos
                                where UPPER(datapedido) like '%$datapedido%'";

                   $resultado = mysql_query($consulta);
                }

                else
                {
                    $consulta = "select cod, datapedido, codfunc, codcli, codprod, quantidade, preco from Pedidos";
                    $resultado = mysql_query($consulta);
                }

                while ($dados = mysql_fetch_array($resultado))
                {
                    $strdados = $dados['cod'] . "*" .  $dados['datapedido'] . "*" . $dados['codfunc'] . "*" . $dados['codcli'] .  "*" . $dados['codprod'] .  "*" . $dados['quantidade'] .  "*" . $dados['preco'] ;
                ?>
                    <tr>
                        <td><?php echo $dados['cod']; ?></td>
                        <td><?php echo $dados['datapedido']; ?></td>
                        <td><?php echo $dados['codfunc']; ?></td>
                        <td><?php echo $dados['codcli']; ?></td>
                        <td><?php echo $dados['codprod']; ?></td>
                        <td><?php echo $dados['quantidade']; ?></td>
                        <?php $precofinal = $dados['preco'] * $dados['quantidade']?>
                        <td><?php echo $dados['preco']; ?></td>
                        <td><?php echo $precofinal; ?></td>

                        <td>

                        <a href="#myModalAlterar" onclick="obterDadosModal('<?php echo $strdados ?>')">
                            <button type='button' id='alterar' name='alterar' class='btn btn-primary' data-toggle='modal' data-target='#myModalAlterar'>Alterar</button>
                        </a>

                        <a href="#myModalExcluir" onclick="obterDadosModal('<?php echo $strdados ?>')">
                            <button type='button' id='excluir' name='excluir' class='btn btn-danger' data-toggle='modal' data-target='#myModalExcluir'>Excluir</button>
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
