<?php
$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db('industria');
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Estoque</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .negativo {
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
            document.getElementById('nome').value = retorno[1];
            document.getElementById('quantidade').value = retorno[2];
            document.getElementById('preco').value = retorno[3];
        }
    </script>
    <div class="container">
        <h2>Estoque</h2>
        <form action="estoque.php" method="POST">
            <input type="text" name="nome" placeholder="Pesquisar por nome" class="span4"
                style="margin-bottom: -2px; height: 25px;">
            <button type="submit" name="pesquisar" class="btn btn-large" style="height: 35px;">Pesquisar</button>
        </form>
        <table border="1px" bordercolor="#FCFCFC" class="table ">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Minimo</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['pesquisar'])) {
                    $nome = $_POST['nome'];
                    $produtos = "SELECT * FROM produtos WHERE nome LIKE '%$nome%'";
                } else {
                    $produtos = "SELECT * FROM produtos";
                }
                
                $result = mysql_query($produtos);
                while ($produtos = mysql_fetch_array($result)) {
                    $codigo = $produtos['cod'];
                    $nome = $produtos['nome'];
                    $quantidade = $produtos['quantidade'];
                    $preco = $produtos['preco'];
                    $minimo = $produtos['estoquemin'];
                    $saldo = $quantidade - $minimo;
                    if ($quantidade <= $minimo) {
                        echo "<tr class='estoque-baixo'>";
                    } else {
                        echo "<tr>";
                    }
                    echo "<td>" . $codigo . "</td>";
                    echo "<td>" . $nome . "</td>";
                    echo "<td>" . $preco . "</td>";
                    echo "<td>" . $quantidade . "</td>";
                    echo "<td>" . $minimo . "</td>";
                    if ($saldo < 0) {
                        echo "<td class='negativo'>" . $saldo . "</td>";
                    } else {
                        echo "<td>" . $saldo . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>