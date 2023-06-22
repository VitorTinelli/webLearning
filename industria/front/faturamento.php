<?php
$conectar = mysql_connect('localhost','root','');
$banco = mysql_select_db('industria');

$sql_clientes = "SELECT * FROM clientes";
$pesquisar_clientes = mysql_query($sql_clientes);

$sql_funcionarios = "SELECT * FROM funcionarios";
$pesquisar_funcionarios = mysql_query($sql_funcionarios);

$sql_produtos = "SELECT * FROM produtos";
$pesquisar_produtos = mysql_query($sql_produtos); 

$total = 0;
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Faturamento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .pedro {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href='menu.html'>Tinelli´s Management System</a></h1>
    </header>
    <script>
        function obterDadosModal(valor) {
            var retorno = valor.split("*");

            document.getElementById('cod').value = retorno[0];
            document.getElementById('datapedido').value = retorno[1];
            document.getElementById('codfunc').value = retorno[2];
            document.getElementById('codcli').value = retorno[3];
            document.getElementById('codprod').value = retorno[4];
            document.getElementById('quantidade').value = retorno[5];
            document.getElementById('preco').value = retorno[6];
        }
    </script>
    <div class="container">
        <div class="row">
            <h2>Faturamento: </h2><br>
            <form action="faturamento.php" method="POST">
                <select name="codprod" id="codprod">
                    <option value="0" selected disabled style="margin-bottom: -2px; height: 25px;">Selecione o Produto</option>
                    <?php
                    $sql_produtos = "SELECT * FROM produtos";
                    $pesquisar_produtos = mysql_query($sql_produtos); 

                    if (mysql_num_rows($pesquisar_produtos) <> 0) {
                        while ($produtos = mysql_fetch_array($pesquisar_produtos)){
                            echo '<option value="'.$produtos['cod'].'">'.$produtos['nome'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                    <button type="submit" name="pesquisarProduto" class="btn btn-large" style="height: 35px;">Pesquisar</button>
            </form>
            <form action="faturamento.php" method="POST">
                <select name="codfunc" id="codfunc">
                    <option value="0" selected disabled style="margin-bottom: -2px; height: 25px;">Selecione o Vendedor</option>
                    <?php
                    $sql_funcionarios = "SELECT * FROM funcionarios";
                    $pesquisar_funcionarios = mysql_query($sql_funcionarios); 

                    if (mysql_num_rows($pesquisar_funcionarios) <> 0) {
                        while ($produtos = mysql_fetch_array($pesquisar_funcionarios)){
                            echo '<option value="'.$produtos['cod'].'">'.$produtos['nome'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                    <button type="submit" name="pesquisarFuncionarios" class="btn btn-large" style="height: 35px;">Pesquisar</button>
            </form>
            <form action="faturamento.php" method="POST">
                <input type="date" name="data_inicio" required>
                <input type="date" name="data_fim" required>
                <button type="submit" name="pesquisaPeriodo" class="btn btn-large" style="height: 35px;">Pesquisar</button>
            </form>
            <br>
            <table border="1px" bordercolor="#FCFCFC" class="table">
                <tr>
                    <td><b>Código</b></td>
                    <td><b>Data</b></td>
                    <td><b>Vendedor</b></td>
                    <td><b>Cliente</b></td>
                    <td><b>Produto</b></td>
                    <td><b>Total R$</b></td>
                </tr>
                <?php
                if (isset($_POST['pesquisarProduto'])) {
                    $codprod = $_POST['codprod'];

                    if ($codprod != "") {
                        $consulta = "SELECT pedidos.cod, pedidos.datapedido, funcionarios.nome as func, clientes.nome as cli, produtos.nome as prod, pedidos.quantidade, pedidos.preco
                                    FROM pedidos, clientes, funcionarios, produtos
                                    WHERE pedidos.codfunc = funcionarios.cod
                                    AND pedidos.codcli = clientes.cod
                                    AND pedidos.codprod = produtos.cod
                                    AND pedidos.codprod = $codprod";
                        $resultado = mysql_query($consulta);
                    } else {
                        $consulta = "SELECT pedidos.cod, pedidos.datapedido, funcionarios.nome as func, clientes.nome as cli, produtos.nome as prod, pedidos.quantidade, pedidos.preco
                                    FROM pedidos, clientes, funcionarios, produtos
                                    WHERE pedidos.codfunc = funcionarios.cod
                                    AND pedidos.codcli = clientes.cod
                                    AND pedidos.codprod = produtos.cod";
                        $resultado = mysql_query($consulta);
                    }
                }

                if (isset($_POST['pesquisarFuncionarios'])) {
                    $codfunc = $_POST['codfunc'];

                    if ($codfunc != "") {
                        $consulta = "SELECT pedidos.cod, pedidos.datapedido, funcionarios.nome as func, clientes.nome as cli, produtos.nome as prod, pedidos.quantidade, pedidos.preco
                                    FROM pedidos, clientes, funcionarios, produtos
                                    WHERE pedidos.codfunc = funcionarios.cod
                                    AND pedidos.codcli = clientes.cod
                                    AND pedidos.codprod = produtos.cod
                                    AND pedidos.codfunc = $codfunc";
                        $resultado = mysql_query($consulta);
                    } else {
                        $consulta = "SELECT pedidos.cod, pedidos.datapedido, funcionarios.nome as func, clientes.nome as cli, produtos.nome as prod, pedidos.quantidade, pedidos.preco
                                    FROM pedidos, clientes, funcionarios, produtos
                                    WHERE pedidos.codfunc = funcionarios.cod
                                    AND pedidos.codcli = clientes.cod
                                    AND pedidos.codprod = produtos.cod";
                        $resultado = mysql_query($consulta);
                    }
                }
                
                elseif (isset($_POST['pesquisaPeriodo'])) {
                    $data_inicio = $_POST['data_inicio'];
                    $data_fim = $_POST['data_fim'];

                    if ($data_inicio != "" && $data_fim != "") {
                        $consulta = "SELECT pedidos.cod, pedidos.datapedido, funcionarios.nome as func, clientes.nome as cli, produtos.nome as prod, pedidos.quantidade, pedidos.preco
                                    FROM pedidos, clientes, funcionarios, produtos
                                    WHERE pedidos.codfunc = funcionarios.cod
                                    AND pedidos.codcli = clientes.cod
                                    AND pedidos.codprod = produtos.cod
                                    AND pedidos.datapedido between '$data_inicio' and '$data_fim'";
                        $resultado = mysql_query($consulta);
                    } else {
                        $consulta = "SELECT pedidos.cod, pedidos.datapedido, funcionarios.nome as func, clientes.nome as cli, produtos.nome as prod, pedidos.quantidade, pedidos.preco
                                    FROM pedidos, clientes, funcionarios, produtos
                                    WHERE pedidos.codfunc = funcionarios.cod
                                    AND pedidos.codcli = clientes.cod
                                    AND pedidos.codprod = produtos.cod";
                        $resultado = mysql_query($consulta);
                    }
                }
                else {
                    $consulta = "SELECT pedidos.cod, pedidos.datapedido, funcionarios.nome as func, clientes.nome as cli, produtos.nome as prod, pedidos.quantidade, pedidos.preco
                                FROM pedidos, clientes, funcionarios, produtos
                                WHERE pedidos.codfunc = funcionarios.cod
                                AND pedidos.codcli = clientes.cod
                                AND pedidos.codprod = produtos.cod";
                    $resultado = mysql_query($consulta);
                }

                while ($dados = mysql_fetch_array($resultado)) {
                    $strdados = $dados['cod'] . "*" .  $dados['datapedido'] . "*" . $dados['func'] . "*" . $dados['cli'] .  "*" . $dados['prod'] .  "*" . $dados['quantidade'] .  "*" . $dados['preco'];
                ?>
                <tr>
                    <td><?php echo $dados['cod']; ?></td>
                    <td><?php echo $dados['datapedido']; ?></td>
                    <td><?php echo $dados['func']; ?></td>
                    <td><?php echo $dados['cli']; ?></td>
                    <td><?php echo $dados['prod']; ?></td>
                    <?php $precofinal = $dados['preco'] * $dados['quantidade']; ?>
                    <td><?php echo number_format($precofinal, 2, ',', '.'); ?></td>
                    <?php $total = $total + $precofinal; ?>
                </tr>
                <?php
                }
                mysql_close($conectar);
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='pedro'><?php echo number_format($total, 2, ',', '.'); ?></td>
                </tr>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
