<?php
$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db('industria');

$sql_funcionarios = "SELECT * FROM funcionarios";
$pesquisar_funcionarios = mysql_query($sql_funcionarios);
$totalComissao = 0;

function calcularComissao($totalVendas) {
    $comissao = $totalVendas * 0.1;
    return $comissao;
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gerenciador de comissão</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .pedro {
            color: blue;
        }
    </style>
</head>

<body>
    <header>
        <h1>Tinelli´s Management System</h1>
    </header>
    <div class="container">
        <div class="row">
            <h2>Gerenciador de comissão:</h2><br>
            <table border="1px" bordercolor="#FCFCFC" class="table ">
                <tr>
                    <td><b>Código</b></td>
                    <td><b>Funcionário</b></td>
                    <td><b>Total de Vendas</b></td>
                    <td><b>Comissão</b></td>
                </tr>
                <?php
                while ($funcionario = mysql_fetch_array($pesquisar_funcionarios)) {
                    $codfunc = $funcionario['cod'];

                    $consulta = "SELECT SUM(pedidos.preco * pedidos.quantidade) as totalVendas
                                FROM pedidos
                                WHERE pedidos.codfunc = $codfunc";
                    $resultado = mysql_query($consulta);
                    $dados = mysql_fetch_array($resultado);

                    $totalVendas = $dados['totalVendas'];
                    $comissao = calcularComissao($totalVendas);
                    $totalComissao += $comissao;
                ?>
                    <tr>
                        <td>
                            <?php echo $funcionario['cod']; ?>
                        </td>
                        <td>
                            <?php echo $funcionario['nome']; ?>
                        </td>
                        <td>
                            <?php echo 'R$ ' . number_format($totalVendas, 2, ',', '.'); ?>
                        </td>
                        <td>
                            <?php echo 'R$ ' . number_format($comissao, 2, ',', '.'); ?>
                        </td>
                    </tr>
                <?php
                }
                mysql_close($conectar);
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='pedro'>
                        <?php echo 'R$ ' . number_format($totalComissao, 2, ',', '.'); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
