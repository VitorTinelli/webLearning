<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: estofados
$banco = mysql_select_db('estofados');

$sql_sofas = "Select * from sofas";
$pesquisar_sofas = mysql_query($sql_sofas);

$sql_pufe = "Select * from pufe";
$pesquisar_pufe = mysql_query($sql_pufe);

$sql_almofadas = "Select * from almofadas";
$pesquisar_almofadas = mysql_query($sql_almofadas); 

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
                $sql_sofas = "select codigo, foto1, nome
                             from sofas";
                $seleciona_sofas = mysql_query($sql_sofas);

                $sql_pufes = "select codigo, foto1, nome
                             from pufe";
                $seleciona_pufes = mysql_query($sql_pufes);
 
                $sql_almofadas = "select codigo, foto1, nome
                                 from almofadas";
                $seleciona_almofadas = mysql_query($sql_almofadas);
                ?>
        
            <div class="text"><b>Nossos Sofás:</b></div>
                
            <?php
                echo '<div class="prudutos-container">';
                while($res = mysql_fetch_array($seleciona_sofas))
                        {
                        echo '<div class="produtos">';
                            echo ''.utf8_encode('<img src="'.$res['foto1'].'"  height="180" width="250" />').'</a><br>';
                            echo '<div class="produtosTexto">';
                                echo '</p><p>';
                                echo utf8_encode($res['nome']);
                                echo '</p>';
                                echo "<form action='sofasInd.php?codigo = codigoM' method='POST'> 
                                    <input type='hidden' name='codigoM' id='codigoM' value='".$res['codigo']."'> 
                                    <input type='submit' name='ler_mais' id='ler_mais' value='Clique Aqui'>
                                    </form>";
                            echo '</div>';
                        echo '</div>';
                        }   
                ?>

            <div class="text"><b>Nossos Pufes:</b></div>
            <?php
                echo '<div class="prudutos-container">';
                while($res = mysql_fetch_array($seleciona_pufes))
                        {
                        echo '<div class="produtos">';
                            echo ''.utf8_encode('<img src="'.$res['foto1'].'"  height="180" width="250" />').'</a><br>';
                            echo '<div class="produtosTexto">';
                                echo '</p><p>';
                                echo utf8_encode($res['nome']);
                                echo '</p>';
                                echo "<form action='pufeInd.php?codigo = codigoM' method='POST'> 
                                    <input type='hidden' name='codigoM' id='codigoM' value='".$res['codigo']."'> 
                                    <input type='submit' name='ler_mais' id='ler_mais' value='Clique Aqui'>
                                    </form>";
                            echo '</div>';
                        echo '</div>';
                        }   
                ?>
                </div>

                <div class="text"><b>Nossos Almofadas:</b></div>
                <?php
                echo '<div class="prudutos-container">';
                while($res = mysql_fetch_array($seleciona_almofadas))
                        {
                        echo '<div class="produtos">';
                            echo ''.utf8_encode('<img src="'.$res['foto1'].'"  height="180" width="250" />').'</a><br>';
                            echo '<div class="produtosTexto">';
                                echo '</p><p>';
                                echo utf8_encode($res['nome']);
                                echo '</p>';
                                echo "<form action='almofadasInd.php?codigo = codigoM' method='POST'> 
                                    <input type='hidden' name='codigoM' id='codigoM' value='".$res['codigo']."'> 
                                    <input type='submit' name='ler_mais' id='ler_mais' value='Clique Aqui'>
                                    </form>";
                            echo '</div>';
                        echo '</div>';
                        }   
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