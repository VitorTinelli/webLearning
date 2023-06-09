<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: portal
$banco = mysql_select_db('portal');

$vazio = 0;


setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');   // definir fuso horario e local para data
date_default_timezone_set('America/Sao_Paulo');

$sql_regiao = "Select * from regiao";
$pesquisar_regiao = mysql_query($sql_regiao);

$sql_categorias = "Select * from categorias";
$pesquisar_categorias = mysql_query($sql_categorias);

$sql_colunistas = "Select * from colunistas";
$pesquisar_colunistas = mysql_query($sql_colunistas); 

if(!empty($_POST['pesq_regiao']))
{
    $regiao  = (empty($_POST['codregiao']))? 'null' : $_POST['codregiao'];

    if ($regiao <> '')
    {
     $sql_materias = "SELECT materias.fotochamada, materias.foto1, materias.data, materias.hora, materias.chamada, materias.resumo
                      FROM materias
                      WHERE materias.codregiao ='$regiao'
                      ORDER BY data desc limit 3";
     
     $seleciona_materias = mysql_query($sql_materias);
     $vazio = 1;
     }
}

if(!empty($_POST['pesq_categoria']))
{
    $categoria  = (empty($_POST['codcategoria']))? 'null' : $_POST['codcategoria'];

    if ($categoria <> '')
    {
     $sql_materias = "SELECT materias.fotochamada, materias.foto1, materias.data, materias.hora, materias.chamada, materias.resumo
                      FROM materias
                      WHERE materias.codcategoria ='$categoria'
                      ORDER BY data desc limit 3";

     $seleciona_materias = mysql_query($sql_materias);
     $vazio = 1;
     }
}

if(!empty($_POST['pesq_colunista']))
{
    $colunista  = (empty($_POST['codcolunista']))? 'null' : $_POST['codcolunista'];

    if ($colunista <> '')
    {
     $sql_materias = "SELECT materias.fotochamada, materias.foto1, materias.data, materias.hora, materias.chamada, materias.resumo
                      FROM materias
                      WHERE materias.codcolunista ='$colunista'
                      ORDER BY data desc limit 3";

     $seleciona_materias = mysql_query($sql_materias);
     $vazio = 1;
     }
}


?>

<html>
    <!-- Head -->
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

        <div id="menu" class="menu" style="display:none">
            <div class="menuoptions">
            <form name="form_site" method="post" action="site.php" enctype="multipart/form-data">
            <div class="select">
                <select name="codregiao" id="codregiao">
                <option value = "0" selected disabled>Selecione a região</option>
                    <?php
                    if (mysql_num_rows($pesquisar_regiao) <> 0){
                        while ($regiao = mysql_fetch_array($pesquisar_regiao)){
                            echo '<option value = "'.$regiao['codigo'].'">'
                                                    .$regiao['nome'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>
            <input type="submit" name="pesq_regiao" id="pesq_regiao" value="Pesquisar" class = "buttons"> 
            </div>

                <div class="select">
                <select name="codcat" id="codcat">
                <option value = "0" selected disabled>Selecione a categoria</option>
                    <?php
                    if (mysql_num_rows($pesquisar_categorias) <> 0){
                        while ($categorias = mysql_fetch_array($pesquisar_categorias)){
                            echo '<option value = "'.$categorias['codigo'].'">'
                                                    .$categorias['nome'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                <input type="submit" name="pesq_categorias" id="pesq_categorias" value="Pesquisar" class = "buttons"> 
                </div>

                <div class="select">
                <select name="codcolunista" id="codcolunista">
                <option value = "0" selected disabled>Selecione o/a colunista</option>
                    <?php
                    if (mysql_num_rows($pesquisar_colunistas) <> 0){
                        while ($colunistas = mysql_fetch_array($pesquisar_colunistas)){
                            echo '<option value = "'.$colunistas['codigo'].'">'
                                                    .$colunistas['nome'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                <input type="submit" name="pesq_colunistas" id="pesq_colunistas" value="Pesquisar" class = "buttons"> 
                </div>
            </div>
        </div> 
        </form>
        <main>
            <div class="colunistas">
                <b>NOSSOS COLUNISTAS:</b>
            </div>

            <div class="colunistas-container">
                    <?php
                        $sql = "select * from colunistas";

                        $resultado = mysql_query($sql);

                        if (mysql_num_rows($resultado) == 0){
                            echo "Desculpe, sua pesquisa não encontrou resultados.";
                        }
                        else{
                            while ($colunistas = mysql_fetch_array($resultado)){
                                echo "<div class='colunista'>";
                                echo "<img src='".$colunistas['foto']."' alt='foto' width='100' height='75'>"."<br>";
                                echo $colunistas ['nome'];
                                echo "</div>";
                            }
                        }
                    ?>
            </div>
            <div class="content">
            <?php
                if ($vazio == 0)
                {
                $sql_materias = "select codigo, fotochamada, data, hora, chamada
                                from materias
                                ORDER BY data desc limit 3";
                $seleciona_materias = mysql_query($sql_materias);
                ?>
        
            <div class="noticias"><b>Noticias em Destaque:</b></div>
                
            <?php
                echo '<div class="materias-container">';
                while($res = mysql_fetch_array($seleciona_materias))
                        {
                        echo '<div class="materias">';
                            echo ''.utf8_encode('<img src="'.$res['fotochamada'].'"  height="180" width="250" />').'</a><br>';
                            echo '<div class="materiasTexto">';
                                echo '<p>';
                                echo utf8_encode(strftime('%A - %d/%m/%Y', strtotime($res['data']))).' - '. $res['hora'];
                                echo '</p><p>';
                                echo utf8_encode($res['chamada']);
                                echo '</p>';
                                echo "<form action='noticia.php?codigo = codigoM' method='POST'> 
                                    <input type='hidden' name='codigoM' id='codigoM' value='".$res['codigo']."'> 
                                    <input type='submit' name='ler_mais' id='ler_mais' value='Leia Mais'>
                                    </form>";
                            echo '</div>';
                        echo '</div>';
                        }
                }
                else
                {
                echo "<center><b>Noticias pesquisadas: </b>"."<br><br>";
                while($res = mysql_fetch_array($seleciona_materias))
                        {
                            echo '<div class="materias">';
                            echo ''.utf8_encode('<img src="'.$res['fotochamada'].'"  height="180" width="250" />').'</a><br>';
                            echo '<div class="materiasTexto">';
                                echo '<p>';
                                echo utf8_encode(strftime('%A - %d/%m/%Y', strtotime($res['data']))).' - '. $res['hora'];
                                echo '</p><p>';
                                echo utf8_encode($res['chamada']);
                                echo '</p>';
                                echo "<form action='noticia.php?codigo = codigoM' method='POST'> 
                                    <input type='hidden' name='codigoM' id='codigoM' value='".$res['codigo']."'> 
                                    <input type='submit' name='ler_mais' id='ler_mais' value='Leia Mais'>
                                    </form>";
                            echo '</div>';
                        echo '</div>';
                        }
                echo '</center>';
                }
                echo '</div>';
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