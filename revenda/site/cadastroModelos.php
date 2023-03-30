<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: revenda
$banco = mysql_select_db('revenda');

$sql_marcas = "Select * from marcas";
$pesquisar_marcas = mysql_query($sql_marcas);

//Se clicar no botão gravar
if (isset($_POST['gravar'])){
    //receber as variaveis do HTML:
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];
    $codmarca = $_POST['codmarca'];
    //comando do SQL (INSERT):
    $sql = "insert into modelos (codigo, nome, codmarca) 
            values ('$codigo', '$nome', '$codmarca')";

    //validar o comando no banco de dados:
    $resultado = mysql_query($sql);

    //verificar se gravou no banco ou ocorreu erro:
    if ($resultado){
        echo "Dados gravados com sucesso.";
    }
    else{
        echo "Erro ao gravar dados.";
    }
}

//Se clicar no botão alterar
if (isset($_POST['alterar'])){

    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];

    //
    $sql = "update modelos set nome = '$nome' 
            where codigo = '$codigo'";

    $resultado = mysql_query($sql);
    if ($resultado){
        echo "Dados alterados com sucesso.";
    }
    else{
        echo "Erro ao alterar dados.";
    }
}

//Se clicar no botão excluir
if (isset($_POST['excluir'])){
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];

    $sql = "delete from modelos
            where codigo = '$codigo' or nome = '$nome'";

    $resultado = mysql_query($sql);
    if ($resultado){
        echo "Dados excluidos com sucesso.";
    }
    else{
        echo "Erro ao excluir dados.";
    }
}

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



<html>
    <!-- Head -->
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastro Modelos</title>
        <link rel="stylesheet" type= "text/css" href="style.css">
    </head>


    <body>
        <div>
        <form name="formulario" method="post" action="cadastroModelos.php">
            <div id="form">
                <h2> Cadastro dos Modelos Revenda de Carros</h2>
                <div class="input-forms">
                <!-- Text inputs -->
                <input required type="text" name="codigo" id="codigo" size=20 class="input">
                <label for="codigo">Código: </label>
                </div>

                <div class="input-forms">
                <input required type="text" name="nome" id="nome" size=20 class="input">
                <label for="nome">Nome: </label>
                </div>

                <div class="select">
                <select name="codmarca" id="codmarca">
                <option value = "0" selected="selected">Selecione a narca</option>
                    <?php
                    if (mysql_num_rows($pesquisar_marcas) <> 0){
                        while ($marcas = mysql_fetch_array($pesquisar_marcas)){
                            echo '<option value = "'.$marcas['codigo'].'">'
                                                    .$marcas['nome'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                </div>
                                

                
                <div>
                <br><br>
                <!-- Botões -->
                <input type="submit" name="gravar" id="gravar" value="Enviar">
                <input type="submit" name="alterar" id="alterar" value="Alterar">
                <input type="submit" name="excluir" id="excluir" value="Excluir">
                <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">
                </div>
            </div>
        </div> 

        </form>
    </body>
</html>