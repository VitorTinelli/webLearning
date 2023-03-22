<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: revenda
$banco = mysql_select_db('revenda');

$sql_modelos = "Select * from modelos";
$pesquisar_modelos = mysql_query($sql_modelos);

$sql_categorias = "Select * from categorias";
$pesquisar_categorias = mysql_query($sql_categorias);

//Se clicar no botão gravar
if (isset($_POST['gravar'])){
    //receber as variaveis do HTML:
    $codigo = $_POST['codigo'];
    $descricao   = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $codcategoria = $_POST['codcategoria'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $localizacao = $_POST['localizacao'];
    $combustivel = $_POST['combustivel'];
    $opcionais = $_POST['opcionais'];
    $valor = $_POST['valor'];
    $foto1 = '';
    $foto2 = '';
    $foto3 = '';

    //comando do SQL (INSERT):
    $sql = "insert into automoveis (codigo, descricao, codmodelo, codcategoria, ano, cor, placa, localizacao, combustivel, opcionais, valor, foto1, foto2, foto3) 
            values ('$codigo', '$descricao', '$codmodelo', '$codcategoria', '$ano', '$cor', '$placa', '$localizacao', '$combustivel', '$opcionais', '$valor', '$foto1', '$foto2', '$foto3')";

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
    $valor   = $_POST['valor'];

    //
    $sql = "update automoveis set valor = '$valor' 
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
    $descricao   = $_POST['descricao'];

    $sql = "delete from automoveis
            where codigo = '$codigo' or descricao = '$descricao'";

    $resultado = mysql_query($sql);
    if ($resultado){
        echo "Dados excluidos com sucesso.";
    }
    else{
        echo "Erro ao excluir dados.";
    }
}

if (isset($_POST['pesquisar']))
{
$sql = "select * from automoveis";

$resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) == 0){ 
        echo "Sua pesquisa não retornou resultados "; 		
        }
    else {
	    echo "Resultado da Pesquisa por automoveis "."<br>";
	    while($automoveis = mysql_fetch_array($resultado))
			{
			    echo "Cod Automovel: ".$automoveis['codigo']."<br>".
			         "Descricao: ".$automoveis['descricao']."<br>".
                     "Codigo do modelo: ".$automoveis['codmodelo']."<br>".
                     "Codigo da categoria: ".$automoveis['codcategoria']."<br>".
                     "Cor: ".$automoveis['cor']."<br>".
                     "Ano: ".$automoveis['ano']."<br>".
                     "Placa: ".$automoveis['placa']."<br>".
                     "Localização: ".$automoveis['localizacao']."<br>".
                     "Tipo de combustivel: ".$automoveis['combustivel']."<br>".
                     "Opcionais: ".$automoveis['opcionais']."<br>".
                     "Valor: ".$automoveis['valor']."<br><br>";
			}
    }
}



?>



<html>
    <!-- Head -->
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastro Automoveis</title>
        <link rel="stylesheet" type= "text/css" href="style.css">
    </head>


    <body class="cadastro">
        <div>
        <form name="formulario" method="post" action="cadastroAutomoveis.php">
            <div id="form">
                <h2> Cadastro dos Automoveis  Revenda de Carros</h2>
                <div class="input-forms">
                <!-- Text inputs -->
                <input required type="text" name="codigo" id="codigo" size=20 class="input">
                <label for="codigo">Código: </label>
                </div>

                <div class="input-forms">
                <input required type="text" name="descricao" id="descricao" size=20 class="input">
                <label for="descricao">Descrição: </label>
                </div>

                <div class="select">
                <select name="codmodelo" id="codmodelo">
                <option value = "0" selected disabled>Selecione o modelo</option>
                    <?php
                    if (mysql_num_rows($pesquisar_modelos) <> 0){
                        while ($modelos = mysql_fetch_array($pesquisar_modelos)){
                            echo '<option value = "'.$modelos['codigo'].'">'
                                                    .$modelos['nome'].'</option>';
                        }
                        echo '</select>';
                    }
                    ?>
                </div>

                <div class="select">
                <select name="codcategoria" id="codcategoria">
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
                </div>
                
                <div class="input-forms">
                <input required type="text" name="ano" id="ano" size=20 class="input">
                <label for="ano">Ano: </label>
                </div>

                <div class="input-forms">
                <input required type="text" name="cor" id="cor" size=20 class="input">
                <label for="cor">Cor: </label>
                </div>

                <div class="input-forms">
                <input required type="text" name="placa" id="placa" size=20 class="input">
                <label for="placa">Placa </label>
                </div>
                
                <div class="input-forms">
                <input required type="text" name="localizacao" id="localizacao" size=20 class="input">
                <label for="localizacao">Localização: </label>
                </div>

                <div class="input-forms">
                <input required type="text" name="combustivel" id="combustivel" size=20 class="input">
                <label for="combustivel">Tipo do combustivel: </label>
                </div>

                <div class="input-forms">
                <input required type="text" name="opcionais" id="opcionais" size=20 class="input">
                <label for="opcionais">Opcionais: </label>
                </div>

                <div class="input-forms">
                <input required type="text" name="valor" id="valor" size=20 class="input">
                <label for="valor">Valor: </label>
                </div>

                <br><br>
                <!-- Botões -->
                <input type="submit" name="gravar" id="gravar" value="Enviar">
                <input type="submit" name="alterar" id="alterar" value="Alterar">
                <input type="submit" name="excluir" id="excluir" value="Excluir">
                <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">
            </div>
        </div> 

        </form>
    </body>
</html>