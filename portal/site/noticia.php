<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: portal
$banco = mysql_select_db('portal');

mysql_set_charset('utf8');

$codigo = $_POST['codigoM'];
$sql_materias = "Select * from materias where materias.codigo = '$codigo'";
$pesquisar_materias = mysql_query($sql_materias);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Noticia</title>
    <link rel="stylesheet" href="css/stylesite.css">
    <meta charset="UTF-8"/>
</head>
    <body>
        <head>
            <meta charset="UTF-8"/>
            <title>Portal da Ilha</title>
            <link rel="stylesheet" type= "text/css" href="css/stylesit.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>

        <body>
            <header>
                <img src="assets/options.png" width="2%"  class="click"  onclick="toggleMenu()"/>
                <img src="assets/logo.png" width="10%"/>
                <img src="assets/user.png" width="2%" class="click" onclick="redLogin()"/>
            </header>


            <main>
                <div class="content2">
                    <br><br>
            <?php
                $res = mysql_fetch_array($pesquisar_materias);
                echo '<center><h3><b>'.$res['chamada'].'</b></h3></center>';
                echo '<center><h5><b>'.$res['resumo'].'</b></h5></center><br><br>';
                echo ''.utf8_encode('<center><img src="'.$res['fotochamada'].'"  width="40%" /></center>').'</a><br><br>';
                echo '<p align="justify/left/right/center"><h4>'.$res['materia'].'</h4></p><br><br>';
                echo ''.utf8_encode('<center><img src="'.$res['foto1'].'"  width="30%" /></center>').'</a>';
                echo ''.utf8_encode('<center><img src="'.$res['foto2'].'"  width="30%" /></center>').'</a><br>';
                
                

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
            <script src="scripts/script.js"></script>
        </body>
</html>