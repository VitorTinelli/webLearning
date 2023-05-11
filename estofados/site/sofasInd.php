<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: estofados
$banco = mysql_select_db('estofados');

mysql_set_charset('utf8');

$codigo = $_POST['codigoM'];
$sql_sofas = "Select * from sofas where sofas.codigo = '$codigo'";
$pesquisar_sofas = mysql_query($sql_sofas);

?>

<html>
    <!-- Head -->
    <head>
        <meta charset="UTF-8"/>
        <title>Loja Michel</title>
        <link rel="stylesheet" type= "text/css" href="css/stylesite.css">
        <link rel="icon" href="assets/ft_logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <header>
            <img src="assets/ft_cutLogo.png" width="15%" onclick="redMenu()" class="click"/>
        </header>

        <div class="menu">
            <a href="sofas.php">Sofás</a>
            <a href="pufes.php">Pufes</a>
            <a href="almofadas.php">Almofadas</a>
        </div>


        <main>
            <div class="content">

                <?php
                $res = mysql_fetch_array($pesquisar_sofas);
                echo ''.utf8_encode('<center><img src="'.$res['foto1'].'"  width="40%" /></center>').'</a><br><br>';
                echo '<center><h3><b>'.$res['nome'].'</b></h3></center>';
                echo '<center><h5><b>'.$res['descricao'].'</b></h5></center><br>';
                echo '<center><h5><b>Preco: '.$res['preco'].'</b></h5></center><br>';
                echo '<center><h5><b>Medidas: '.$res['medida'].'</b></h5></center><br>';
                echo '<center><h5><b>Peso: '.$res['peso'].'</b></h5></center><br>';
                echo '<center><h5><b>Estrutura: '.$res['estrutura'].'</b></h5></center><br>';
                echo '<center><h5><b>Modelo: '.$res['modelo'].'</b></h5></center><br>';
                echo '<center><h5><b>Tecido: '.$res['tecido'].'</b></h5></center><br>';
                echo '<center><h5><b>Cor: '.$res['cor'].'</b></h5></center><br><br>';


                
                ?>
                
            </div>
        </main>

        

        
            <footer>
                <div>
                <p>Developer: Vitor Tinelli | | Copyright© 2023 All rights reserved</p>
                </div>
                <div>
                <img src="assets/ft_logoGithub.png" alt="github.com/VitorTinelli" width="1.8%" onclick="redGit()" class="click">
                <img src="assets/ft_logoInstagram.png" alt="instagram.com/VitorTinelli" width="2%" onclick="redInsta()" class="click">
                </div>
            </footer>
        
    

    <script src="javascript/scripts.js"></script>
</body>
</html>