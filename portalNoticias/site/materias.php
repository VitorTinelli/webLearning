<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: portal
$banco = mysql_select_db('portal');


$sql_regiao = "Select * from regiao";
$pesquisar_regiao = mysql_query($sql_regiao);

$sql_categorias = "Select * from categorias";
$pesquisar_categorias = mysql_query($sql_categorias);

$sql_colunistas = "Select * from colunistas";
$pesquisar_colunistas = mysql_query($sql_colunistas); 
?>

<html>
    <!-- Head -->
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastro de Matérias</title>
        <link rel="stylesheet" type= "text/css" href="css/styles.css">
        <html lang="pt-br">
    </head>


    <body>
    <div>
        <form name="formulario" method="post" action="materias.php" enctype="multipart/form-data">
            <div id="form">
                <h2> Cadastro de Matérias</h2>

                <div class="dataHora">
                    <input type="date" name="data" id="data">
                    <input type="time" name="hora" id="hora">
                </div>

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
                </div>

                <div class="input-forms">
                    <input required type="text" name="chamada" id="chamada" size=20 class="input">
                    <label for="chamada">Chamada: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="resumo" id="resumo" size=20 class="input"> 
                    <label for="resumo">Resumo: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="materia" id="materia" size=20 class="input">
                    <label for="materia">Matéria: </label>
                </div>
                
                <br><br>
                Foto Chamada:
                <input type="file" name="foto1" id="foto1" size="50">    <!-- campos fotos  -->
                <br><br>
                Foto 02:
                <input type="file" name="foto2" id="foto2" size="50">   <!-- campos fotos  -->
                <br><br>
                Foto 03:
                <input type="file" name="foto3" id="foto3" size="50">   <!-- campos fotos  -->
                <br><br>




                <div>
                <!-- Botões -->
                <input type="submit" name="gravar" id="gravar" value="Enviar" class = "buttons">
                <input type="submit" name="alterar" id="alterar" value="Alterar" class = "buttons">
                <input type="submit" name="excluir" id="excluir" value="Excluir" class = "buttons">
                <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar" class = "buttons">
                </div>

            </form> 
        </div>
            <div>
                <?php
                    //Se clicar no botão gravar
if (isset($_POST['gravar'])){
    //receber as variaveis do HTML:
    $data   = $_POST['data'];
    $hora = $_POST['hora'];
    $codregiao = $_POST['codregiao'];
    $codcat = $_POST['codcat'];
    $codcolunista = $_POST['codcolunista'];
    $chamada = $_POST ['chamada'];
    $resumo = $_POST['resumo'];
    $materia = $_POST ['materia'];
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
    $sql = "insert into materias (data, hora, codregiao, codcat, codcolunista, chamada, resumo, materia, fotochamada, foto1, foto2) 
            values ('$data', '$hora', '$codregiao', '$codcat', '$codcolunista', '$chamada', '$resumo', '$materia', '$caminho_imagem1', '$caminho_imagem2', '$caminho_imagem3')";

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

                    if (isset($_POST['alterar'])){

                        $data   = $_POST['data'];
                        $hora = $_POST['hora'];
                        $chamada = $_POST['chamada'];
                        $resumo = $_POST['resumo'];
                        $materia = $_POST['materia'];
                        $foto1 = $_FILES['foto1']; // campos fotos
                        $foto2 = $_FILES['foto2']; // campos fotos
                        $foto3 = $_FILES['foto3']; // campos fotos

                        //
                        $sql = "update materias set resumo = '$resumo', materia = '$materia'  
                                where chamada = '$chamada'";

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

                        $data   = $_POST['data'];
                        $hora = $_POST['hora'];
                        $chamada = $_POST['chamada'];
                        $resumo = $_POST['resumo'];
                        $materia = $_POST['materia'];
                        $foto1 = $_FILES['foto1']; // campos fotos
                        $foto2 = $_FILES['foto2']; // campos fotos
                        $foto3 = $_FILES['foto3']; // campos fotos

                        $sql = "delete from materias
                                where chamada = '$chamada'";

                        $resultado = mysql_query($sql);
                        if ($resultado){
                            echo "Dados excluidos com sucesso.";
                        }
                        else{
                            echo "Erro ao excluir dados.";
                        }
                    }

                    if (isset($_POST['pesquisar'])){
                       
                        $data   = $_POST['data'];
                        $hora = $_POST['hora'];
                        $chamada = $_POST['chamada'];
                        $resumo = $_POST['resumo'];
                        $materia = $_POST['materia'];
                        $foto1 = $_FILES['foto1']; // campos fotos
                        $foto2 = $_FILES['foto2']; // campos fotos
                        $foto3 = $_FILES['foto3']; // campos fotos

                        $sql = "select * from materias";

                        $resultado = mysql_query($sql);

                        if (mysql_num_rows($resultado) == 0){
                            echo "Desculpe, sua pesquisa não encontrou resultados.";
                        }
                        else{
                            echo "Resultado da pesquisa por materias:"."<br><br>";
                            while ($materias = mysql_fetch_array($resultado)){
                                echo "Codigo: ".$materias['codigo']."<br>";
                                echo "Codigo Região: ".$materias['codregiao']."<br>";
                                echo "Codigo Categoria: ".$materias['codcat']."<br>";
                                echo "Codigo Colunista: ".$materias['codcolunista']."<br>";
                                echo "Data/hora: ".$materias['data']." / ".$materias['hora']."<br>";
                                echo "Chamada: ".$materias['chamada']."<br>";
                                echo "Resumo: ".$materias ['resumo']."<br>";
                                echo "Foto Chamada:" . "<br>" . "<img src='".$materias['fotochamada']."' alt='foto chamada' width='100' height='50'>"."<br><br>";
                            }
                        }
                    }
                ?>
            </div>
            </div>
        </form>
        
    </body>
</html>