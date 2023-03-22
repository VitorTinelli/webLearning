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


if (isset($_POST['pesquisarModelo']))
{
$sql = "select * from modelos";

$resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) == 0){ 
        echo "Sua pesquisa n�o retornou resultados "; 		
        }
    else {
	    echo "Resultado da Pesquisa por Modelos "."<br>";
	    while($modelos = mysql_fetch_array($resultado))
			{
			    echo "Cod Modelo: ".$modelos['codigo']."<br>".
			         "Nome: ".$modelos['nome']."<br>".
                     "Cod Marca: ".$modelos['codmarca']."<br><br>";
			}
    }
}


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

                <form name="formulario" method="post" action="index.php">
                

                    <div class="select">
                    <select name="codigo" id="codigo">
                    <option value = "0" selected disabled>Selecione a Descrição:</option>
                        <?php
                        if (mysql_num_rows($pesquisar_automoveis) <> 0){
                            while ($automoveis = mysql_fetch_array($pesquisar_automoveis)){
                                echo '<option value = "'.$automoveis['codigo'].'">'
                                                        .$automoveis['descricao'].'</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>

                    </form>

              </main>

        </body>


    </html>
