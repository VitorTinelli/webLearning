<?php
$conectar               = mysql_connect('localhost','root','');
$banco                  = mysql_select_db('industria');

$sql_clientes           = "Select * from clientes";
$pesquisar_clientes     = mysql_query($sql_clientes);

$sql_funcionarios       = "Select * from funcionarios";
$pesquisar_funcionarios = mysql_query($sql_funcionarios);

$sql_produtos           = "Select * from produtos";
$pesquisar_produtos     = mysql_query($sql_produtos); 
$total = 0
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Faturamento </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .pedro {
            color: red;
        }
    </style>
</head>

<body>
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
                    <option value="0" selected disabled style="margin-bottom: -2px; height: 25px;">Selecione o Produto
                    </option>
                    <?php
                            $sql_produtos           = "Select * from produtos";
                            $pesquisar_produtos     = mysql_query($sql_produtos); 

                            if (mysql_num_rows($pesquisar_produtos) <> 0){
                                while ($produtos = mysql_fetch_array($pesquisar_produtos)){
                                    echo '<option value = "'.$produtos['cod'].'">'
                                                            .$produtos['nome'].'</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                    <button type="submit" name="pesquisar" class="btn btn-large"
                        style="height: 35px;">Pesquisar</button>
            </form>
            <table border="1px" bordercolor="#FCFCFC" class="table ">
                <tr>
                    <td><b>Código</b></td>
                    <td><b>Data</b></td>
                    <td><b>Vendedor</b></td>
                    <td><b>Cliente</b></td>
                    <td><b>Produto</b></td>
                    <td><b>Total R$</b></td>
                </tr>
                <?php
                if (isset($_POST['pesquisar']))
                {
                   $codprod   = $_POST['codprod'];

                   if ($codprod != ""){
                    $consulta = "select pedidos.cod, pedidos.datapedido, funcionarios.nome func, clientes.nome cli, produtos.nome prod, pedidos.quantidade, pedidos.preco
                                from pedidos, clientes, funcionarios, produtos
                                where pedidos.codfunc = funcionarios.cod
                                and pedidos.codcli = clientes.cod
                                and pedidos.codprod = produtos.cod
                                and pedidos.codprod = $codprod";
                    $resultado = mysql_query($consulta);
                   } else {
                    $consulta = "select pedidos.cod, pedidos.datapedido, funcionarios.nome func, clientes.nome cli, produtos.nome prod, pedidos.quantidade, pedidos.preco
                                from pedidos, clientes, funcionarios, produtos
                                where pedidos.codfunc = funcionarios.cod
                                and pedidos.codcli = clientes.cod
                                and pedidos.codprod = produtos.cod";
                    $resultado = mysql_query($consulta);
                   }
                }

                else
                {
                    $consulta = "select pedidos.cod, pedidos.datapedido, funcionarios.nome func, clientes.nome cli, produtos.nome prod, pedidos.quantidade, pedidos.preco
                                from pedidos, clientes, funcionarios, produtos
                                where pedidos.codfunc = funcionarios.cod
                                and pedidos.codcli = clientes.cod
                                and pedidos.codprod = produtos.cod";
                    $resultado = mysql_query($consulta);
                }

                while ($dados = mysql_fetch_array($resultado))
                {
                    $strdados = $dados['cod'] . "*" .  $dados['datapedido'] . "*" . $dados['func'] . "*" . $dados['cli'] .  "*" . $dados['prod'] .  "*" . $dados['quantidade'] .  "*" . $dados['preco'] ;
                ?>
                <tr>
                    <td>
                        <?php echo $dados['cod']; ?>
                    </td>
                    <td>
                        <?php echo $dados['datapedido']; ?>
                    </td>
                    <td>
                        <?php echo $dados['func']; ?>
                    </td>
                    <td>
                        <?php echo $dados['cli']; ?>
                    </td>
                    <td>
                        <?php echo $dados['prod']; ?>
                    </td>
                    <?php $precofinal = $dados['preco'] * $dados['quantidade']?>
                    <td>
                        <?php echo number_format($precofinal, 2, ',', '.'); ?>
                    </td>
                    <?php $total = $total + $precofinal;?>
                </tr>
                <?php
                }
                mysql_close($conectar);
                ?>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td class='pedro'>
                        <?php echo number_format($total, 2, ',', '.'); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>