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
    $foto1 = $_FILES['foto1']; // campos fotos
    $foto2 = $_FILES['foto2']; // campos fotos
    $foto3 = $_FILES['foto3']; // campos fotos

    $error = 0;
    $error2 = 0;
    $error3 = 0;
    }
    
    // ------verificar op�oes do arquivo fotos anexadas ----
    
    // Se a foto estiver sido selecionada
    if ((!empty($foto1['name'])) and (!empty($foto2['name'])) and (!empty($foto3['name'])))
    {
            // pode definir Largura maxima em pixels
            $largura = 5000;
            // pode definir Altura maxima em pixels
            $altura = 5000;
            // pode definir Tamanho maximo do arquivo em bytes
            $tamanho = 5000000;
    
            // Verifica se o arquivo anexado nao e uma imagem (extensoes)
            if(!preg_match("/^image\/(jpg|jpeg|png|bmp)$/",$foto1['type'])){
                $error[1] = "Não é uma imagem...";
                }
            if(!preg_match("/^image\/(jpg|jpeg|png|bmp)$/",$foto2['type'])){
                $error2[1] = "Não é uma imagem...";
                }
            if(!preg_match("/^image\/(jpg|jpeg|png|bmp)$/",$foto3['type'])){
                $error3[1] = "Não é uma imagem...";
                }    
            // capturar as dimensoes da imagem
            $dimensoes = getimagesize($foto1['tmp_name']);
            $dimensoes2 = getimagesize($foto2['tmp_name']);
            $dimensoes3 = getimagesize($foto3['tmp_name']);
    
    
            // Verifica se a largura da imagem maior que a largura permitida
            if($dimensoes[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
    
            // Verifica se a altura da imagem  maior que a altura permitida
            if($dimensoes[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
    
            // Verifica se o tamanho da imagem maior que o tamanho permitido
            if($foto1['size'] > $tamanho) {
                    $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }

            // Verifica se a largura da imagem maior que a largura permitida
            if($dimensoes2[0] > $largura) {
                $error2[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
    
            // Verifica se a altura da imagem  maior que a altura permitida
            if($dimensoes2[1] > $altura) {
                $error2[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
    
            // Verifica se o tamanho da imagem maior que o tamanho permitido
            if($foto2['size'] > $tamanho) {
                    $error2[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }

            // Verifica se a largura da imagem maior que a largura permitida
            if($dimensoes3[0] > $largura) {
                $error3[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
    
            // Verifica se a altura da imagem  maior que a altura permitida
            if($dimensoes3[1] > $altura) {
                $error3[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
            }
    
            // Verifica se o tamanho da imagem maior que o tamanho permitido
            if($foto3['size'] > $tamanho) {
                    $error3[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }
    
    
            // Se nao houver nenhum erro na foto anexada
            if (($error == 0 ) and ($error2 == 0) and ($error3 == 0))
            {
                // Pega extensao da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto1['name'],$ext);
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto2['name'],$ext2);    
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto3['name'],$ext3);
                // Gera um nome unico para a imagem
                $nome_imagem1 = md5(uniqid(time())).".".$ext[1];
                $nome_imagem2 = md5(uniqid(time())).".".$ext2[1];
                $nome_imagem3 = md5(uniqid(time())).".".$ext3[1];
    
                // Caminho de onde armazena a imagem (pasta criada para fotos)
                $caminho_imagem1 = "fotos/".$nome_imagem1;
                $caminho_imagem2 = "fotos/".$nome_imagem2;
                $caminho_imagem3 = "fotos/".$nome_imagem3;
    
                // Faz o upload da imagem para seu respectivo caminho (pasta criada para fotos)
                move_uploaded_file($foto1['tmp_name'],$caminho_imagem1);
                move_uploaded_file($foto2['tmp_name'],$caminho_imagem2);
                move_uploaded_file($foto3['tmp_name'],$caminho_imagem3);
            }

    //comando do SQL (INSERT):
    $sql = "insert into automoveis (codigo, descricao, codmodelo, codcategoria, ano, cor, placa, localizacao, combustivel, opcionais, valor, foto1, foto2, foto3) 
            values ('$codigo', '$descricao', '$codmodelo', '$codcategoria', '$ano', '$cor', '$placa', '$localizacao', '$combustivel', '$opcionais', '$valor', '$caminho_imagem1', '$caminho_imagem2', '$caminho_imagem3')";

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
        <form name="formulario" method="post" action="cadastroAutomoveis.php" enctype="multipart/form-data">
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
                Foto 01:
                <input type="file" name="foto1" id="foto1" size="50">    <!-- campos fotos  -->
                <br><br>
                Foto 02:
                <input type="file" name="foto2" id="foto2" size="50">   <!-- campos fotos  -->
                <br><br>
                Foto 03:
                <input type="file" name="foto3" id="foto3" size="50">   <!-- campos fotos  -->
                <br><br>

                <!-- Botões -->
                <input type="submit" name="gravar" id="gravar" value="Enviar">
                <input type="submit" name="alterar" id="alterar" value="Alterar">
                <input type="submit" name="excluir" id="excluir" value="Excluir">
                <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">
            </div>
        </div> 

        </form>

        <div>
            <?php
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
                                     "Valor: ".$automoveis['valor']."<br>".
                                     "foto1: <img src='".$automoveis['foto1']."' alt='Logo da revenda de carros' width='100' height='50'>"."<br>".
                                     "foto2: <img src='".$automoveis['foto2']."' alt='Logo da revenda de carros' width='100' height='50'>"."<br>".
                                     "foto3: <img src='".$automoveis['foto3']."' alt='Logo da revenda de carros' width='100' height='50'>"."<br><br><br><br>";
                                     
                            }
                    }
                }

            ?>
        </div>
    </body>
</html>