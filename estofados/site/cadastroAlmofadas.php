<?php
$servidor = mysql_connect('localhost','root','') ;

$banco = mysql_select_db('estofados');
mysql_set_charset('utf8');
?>

<html>
    <!-- Head -->
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastros das Almofadas</title>
        <link rel="stylesheet" type= "text/css" href="css/styles.css">
    </head>


    <body> 
        <div>
        <form name="formulario" method="post" action="cadastroAlmofadas.php" enctype="multipart/form-data">
            <div id="form">
                <h2> Cadastro das Almofadas</h2>
                <div class="input-forms">
                    <input required type="text" name="nome" id="nome" size=20 class="input">
                    <label for="nome">Nome: </label>
                </div>
                <div class="input-forms">
                    <input required type="text" name="descricao" id="descricao" size=20 class="input">
                    <label for="descricao">Descrição: </label>
                </div>
                <div class="input-forms">
                    <input required type="text" name="preco" id="preco" size=20 class="input">
                    <label for="preco">Preço: </label>
                </div>
                <div class="input-forms">
                    <input required type="text" name="medida" id="medida" size=20 class="input">
                    <label for="medida">Medida: </label>
                </div>
                <div class="input-forms">
                    <input required type="text" name="conjunto" id="conjunto" size=20 class="input">
                    <label for="conjunto">Conjunto (Conjunto ou Avulsa): </label>
                </div>
                <div class="input-forms">
                    <input required type="text" name="modelo" id="modelo" size=20 class="input">
                    <label for="modelo">Modelo: </label>
                </div>
                <div class="input-forms">
                    <input required type="text" name="tecido" id="tecido" size=20 class="input">
                    <label for="tecido">Tecido: </label>
                </div>
                <div class="input-forms">
                    <input required type="text" name="cor" id="cor" size=20 class="input">
                    <label for="cor">Cor: </label>
                </div>
                <div class="input-forms">
                    <input required type="text" name="enchimento" id="enchimento" size=20 class="input">
                    <label for="enchimento">Enchimento: </label>
                </div>
                Foto 1:
                <input type="file" name="foto1" id="foto1" size="50">    <!-- campos fotos  -->
                <br><br>

                <div>
                <!-- Botões -->
                <input type="submit" name="gravar" id="gravar" value="Enviar" class = "buttons">
                <input type="submit" name="alterar" id="alterar" value="Alterar" class = "buttons">
                <input type="submit" name="excluir" id="excluir" value="Excluir" class = "buttons">
                <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar" class = "buttons">

                </div>
                </div> 
            <div class = "resultados">
                <?php
                    //Se clicar no botão gravar
                    if (isset($_POST['gravar'])){
                        //receber as variaveis do HTML:
                        $nome        = $_POST['nome'];
                        $descricao   = $_POST['descricao'];
                        $preco       = $_POST['preco'];
                        $medida      = $_POST['medida'];
                        $conjunto        = $_POST['conjunto'];
                        $modelo      = $_POST['modelo'];
                        $tecido      = $_POST['tecido'];
                        $cor         = $_POST['cor'];
                        $enchimento  = $_POST['enchimento'];
                        $foto1       = $_FILES['foto1'];

                        $error = 0;

                        }
                        
                        // ------verificar op�oes do arquivo fotos anexadas ----
                        
                        // Se a foto estiver sido selecionada
                        if (!empty($foto1['name']))
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

                                // capturar as dimensoes da imagem
                                $dimensoes = getimagesize($foto1['tmp_name']);
                                
                        
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
                                
                                // Se nao houver nenhum erro na foto anexada
                                if (($error == 0 ) )
                                {
                                    // Pega extensao da imagem
                                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto1['name'],$ext);
                                     
                                    // Gera um nome unico para a imagem
                                    $nome_imagem1 = md5(uniqid(time())).".".$ext[1];
                            
                                    // Caminho de onde armazena a imagem (pasta criada para fotos)
                                    $caminho_imagem1 = "fotos/".$nome_imagem1;
                                    
                                    // Faz o upload da imagem para seu respectivo caminho (pasta criada para fotos)
                                    move_uploaded_file($foto1['tmp_name'],$caminho_imagem1);
                                    
                                }
                            


                        //comando do SQL (INSERT):
                        $sql = "insert into almofadas (nome, descricao, preco, medida, conjunto, modelo, tecido, cor, enchimento, foto1) 
                                values ('$nome', '$descricao', '$preco', '$medida', '$conjunto', '$modelo', '$tecido', '$cor', '$enchimento', '$caminho_imagem1')";

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

                        $nome        = $_POST['nome'];
                        $descricao   = $_POST['descricao'];

                        //
                        $sql = "update almofadas set descricao = '$descricao' 
                                where nome = '$nome'";

                        $resultado = mysql_query($sql);
                        if ($resultado){
                            echo "<div class = 'form'>Dados alterados com sucesso.</div>";
                        }
                        else{
                            echo "<div class = 'form'>Erro ao alterar dados.</div>";
                        }
                    }

                    //Se clicar no botão excluir
                    if (isset($_POST['excluir'])){
                        $nome   = $_POST['nome'];

                        $sql = "delete from almofadas
                                where nome = '$nome'";

                        $resultado = mysql_query($sql);
                        if ($resultado){
                            echo "Dados excluidos com sucesso.";
                        }
                        else{
                            echo "Erro ao excluir dados.";
                        }
                    }

                    if (isset($_POST['pesquisar'])){
                        $nome   = $_POST['nome'];

                        $sql = "select * from almofadas";

                        $resultado = mysql_query($sql);

                        if (mysql_num_rows($resultado) == 0){
                            echo "Desculpe, sua pesquisa não encontrou resultados.";
                        }
                        else{
                            echo "Resultado da pesquisa por sofás:"."<br><br>";
                            while ($almofadas = mysql_fetch_array($resultado)){
                                echo "Codigo: ".$almofadas['codigo']."<br>";
                                echo "Nome: ".$almofadas ['nome']."<br>";
                                echo "Descrição: ".$almofadas ['descricao']."<br>";
                                echo "Preço: ".$almofadas ['preco']."<br>";
                                echo "Medida: ".$almofadas ['medida']."<br>";
                                echo "conjunto: ".$almofadas ['conjunto']."<br>";
                                echo "modelo: ".$almofadas ['modelo']."<br>";
                                echo "Tecido: ".$almofadas ['tecido']."<br>";
                                echo "Cor: ".$almofadas ['cor']."<br>";
                                echo "Enchimento: ".$almofadas ['enchimento']."<br>";
                                echo "Foto 1:" . "<br>" . "<img src='".$almofadas['foto1']."' alt='foto1' width='130' height='100'>"."<br><br>";
                            }
                        }
                    }
                ?>
            </div>
            </div>
        </form>
        
    </body>
</html>