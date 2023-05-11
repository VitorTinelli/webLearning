<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: estofados
$banco = mysql_select_db('estofados');

$sql_sofas = "Select * from sofas";
$pesquisar_sofas = mysql_query($sql_sofas);

$vazio = 0;

if(!empty($_POST['pesq_modelo']))
{
    $modelo  = (empty($_POST['modelo']))? 'null' : $_POST['modelo'];

    if ($modelo <> '')
    {
     $sql_sofas = "SELECT  * FROM sofas WHERE modelo ='$modelo'";
                     
     
     $seleciona_sofas = mysql_query($sql_sofas);
     $vazio = 1;
    }
}


if(!empty($_POST['pesq_cor']))
{
    $cor  = (empty($_POST['cor']))? 'null' : $_POST['cor'];

    if ($cor <> '')
    {
     $sql_sofas = "SELECT * FROM sofas WHERE sofas.cor ='$cor'";
         
     $seleciona_sofas = mysql_query($sql_sofas);
     $vazio = 1;
    }
}

if(!empty($_POST['pesq_preco']))
{
    $preco  = (empty($_POST['preco']))? 'null' : $_POST['preco'];

    if ($preco <> '')
    {
     $sql_sofas = "SELECT * FROM sofas WHERE sofas.preco <= '$preco'";

     
     $seleciona_sofas = mysql_query($sql_sofas);
     $vazio = 1;
    }
}
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
        <div>
        <div class="menuoptions">
            <form name="form_sofas" method="post" action="sofas.php" enctype="multipart/form-data">
                <div class="select">
                <select name="modelo" id="modelo">
                <option value = "0" selected disabled>Selecione o modelo</option>
                    <?php
                    if (mysql_num_rows($pesquisar_sofas) <> 0){
                        while ($modelo = mysql_fetch_array($pesquisar_sofas)){
                            echo '<option value = "'.$modelo['modelo'].'">'
                                                    .$modelo['modelo'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                <input type="submit" name="pesq_modelo" id="pesq_modelo" value="Pesquisar" class = "buttons"> 
                </div>

                <div class="select">
                <select name="cor" id="cor">
                <option value = "0" selected disabled>Selecione a cor</option>
                    <?php
                    if (mysql_num_rows($pesquisar_sofas) <> 0){
                        $pesquisar_cores = mysql_query("SELECT DISTINCT cor FROM sofas");
                        while ($cor = mysql_fetch_array($pesquisar_cores)){
                            echo '<option value="'.$cor['cor'].'">'.$cor['cor'].'</option>';
                        }
                    }
                    ?>
                <input type="submit" name="pesq_cor" id="pesq_cor" value="Pesquisar" class = "buttons"> 
                </div>

                <div class="select">
                <select name="preco" id="preco">
                <option value = "0" selected disabled>Limite de Preço</option>
                    <?php
                    if (mysql_num_rows($pesquisar_sofas) <> 0){
                        $pesquisar_preco = mysql_query("SELECT DISTINCT preco FROM sofas");
                        while ($preco = mysql_fetch_array($pesquisar_preco)){
                            echo '<option value="'.$preco['preco'].'">'.$preco['preco'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>,
                <input type="submit" name="pesq_preco" id="pesq_preco" value="Pesquisar" class = "buttons"> 
                </div>
                </form>
            </div>


        <main>
            <div class="content">
            <?php
                if ($vazio == 0)
                {
                $sql_sofas = "select codigo, foto1, nome
                             from sofas";
                $seleciona_sofas = mysql_query($sql_sofas);
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
                } else{
                    while($res = mysql_fetch_array($seleciona_sofas)){
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