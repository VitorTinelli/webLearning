<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: revenda
$banco = mysql_select_db('revenda');

$sql_marcas = "Select * from marcas";
$pesquisar_marcas = mysql_query($sql_marcas);

$sql_modelos = "Select * from modelos";
$pesquisar_modelos = mysql_query($sql_modelos);

$sql_categorias = "Select * from categorias";
$pesquisar_categorias = mysql_query($sql_categorias);

$sql_automoveis = "Select * from automoveis";
$pesquisar_automoveis = mysql_query($sql_automoveis);

?>

    <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type= "text/css" href="stylemain.css">
            <title>Revenda de Carros</title>
        </head>


        <body>
            <header>
                <img src="./assets/logo.png" alt="Logo da revenda de carros" width="100" height="50">
                <nav>
                  <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="#">Contato </a></li>
                  </ul>
                </nav>
              </header>


              <main class="content">

                <form name="formulario" method="post" action="home.php">
                
                    <div class="select">
                    <select name="codmodelo" id="codmodelo">
                    <option value = "0" selected disabled>Selecione o modelo:</option>
                        <?php
                        if (mysql_num_rows($pesquisar_modelos) <> 0){
                            while ($modelos = mysql_fetch_array($pesquisar_modelos)){
                                echo '<option value = "'.$modelos['codigo'].'">'
                                                        .$modelos['nome'].'</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                        <button>
                        <input type="submit" name="pesquisarModelo" id="pesquisar" value="Pesquisar">
                        </button>
                    </div>

                <div class="select">
                <select name="codcategorias" id="codcategorias">
                <option value = "0" selected disabled>Selecione a categoria:</option>
                    <?php
                    if (mysql_num_rows($pesquisar_categorias) <> 0){
                        while ($categorias = mysql_fetch_array($pesquisar_categorias)){
                            echo '<option value = "'.$categorias['codigo'].'">'
                                                    .$categorias['nome'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                    <button>
                        <input type="submit" name="pesquisarcategorias" id="pesquisar" value="Pesquisar">
                    </button>
                </div>
                </form>

                <div>
                    <?php
                                //pesquisar modelos
                                if (isset($_POST['pesquisarModelo']))
                                {

                                $codmodelo = $_POST['codmodelo'];
                                $sql = "select * from automoveis 
                                where codmodelo = '$codmodelo'";

                                $resultado = mysql_query($sql);

                                    if (mysql_num_rows($resultado) == 0){ 
                                        echo "Sua pesquisa não retornou resultados "; 		
                                        }
                                    else {
                                        echo "Resultado da Pesquisa por automoveis "."<br>";
                                        while($automoveis = mysql_fetch_array($resultado))
                                            {
                                                echo"Descricao: ".$automoveis['descricao']."<br>".
                                                    "Valor: ".$automoveis['valor']."<br>".
                                                    "Ano: ".$automoveis['ano']."<br>".
                                                    "Cor: ".$automoveis['cor'].'</option>';

                                            }
                                    }
                                }
                            
                            //pesquisar Categorias
                            if (isset($_POST['pesquisarcategorias']))
                            {

                            $codcategorias = $_POST['codcategorias'];
                            $sql = "select * from automoveis 
                            where codcategoria = '$codcategorias'";

                            $resultado = mysql_query($sql);

                                if (mysql_num_rows($resultado) == 0){ 
                                    echo "Sua pesquisa não retornou resultados "; 		
                                    }
                                else {
                                    echo "Resultado da Pesquisa por automoveis "."<br>";
                                    while($automoveis = mysql_fetch_array($resultado))
                                        {
                                            echo"Descricao: ".$automoveis['descricao']."<br>".
                                                "Valor: ".$automoveis['valor']."<br>".
                                                "Ano: ".$automoveis['ano']."<br>".
                                                "Cor: ".$automoveis['cor'].'</option>';

			}
    }
}
                    
                    
                    
                 
                    ?>
                </div>
              </main>

        </body>


    </html>
