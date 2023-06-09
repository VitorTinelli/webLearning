<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: portal
mysql_set_charset('utf8');
$banco = mysql_select_db('portal');
?>

<html>
    <!-- Head -->
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastro de Colunistas</title>
        <link rel="stylesheet" type= "text/css" href="css/styles.css">
    </head>


    <body>
        <div>
        <form name="formulario" method="post" action="colunista.php" enctype="multipart/form-data">
            <div id="form">
                <h2> Cadastro de colunistas</h2>

                <div class="input-forms">
                    <input required type="text" name="nome" id="nome" size=20 class="input">
                    <label for="nome">Nome: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="email" id="email" size=20 class="input"> 
                    <label for="email">Email: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="login" id="login" size=20 class="input">
                    <label for="login">Usuário: </label>
                </div>

                <div class="input-forms">
                    <input required type="text" name="senha" id="senha" size=20 class="input">
                    <label for="senha">Senha: </label>
                </div>

                Foto:
                <input type="file" name="foto1" id="foto1" size="50">   <!-- campos fotos  -->
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
                        $nome   = $_POST['nome'];
                        $email  = $_POST['email'];
                        $login  = $_POST['login'];
                        $senha  = $_POST['senha'];
                        $foto1 = $_FILES['foto1']; // campos fotos
                        $error = 0;

                    if ((!empty($foto1['name'])))
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
            if ($error == 0 )
            {
                // Pega extensao da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto1['name'],$ext);


                // Gera um nome unico para a imagem
                $nome_imagem1 = md5(uniqid(time())).".".$ext[1];

    
                // Caminho de onde armazena a imagem (pasta criada para fotos)
                $caminho_imagem1 = "fotos/".$nome_imagem1;

    
                // Faz o upload da imagem para seu respectivo caminho (pasta criada para fotos)
                move_uploaded_file($foto1['tmp_name'],$caminho_imagem1);


                //comando do SQL (INSERT):
                $sql = "insert into colunistas (nome, email, login, senha, foto) 
                values ('$nome', '$email', '$login', '$senha', '$caminho_imagem1')";
                
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
    }
}

                    //Se clicar no botão alterar
                    if (isset($_POST['alterar'])){

                        $nome   = $_POST['nome'];
                        $email  = $_POST['email'];
                        $login  = $_POST['login'];
                        $senha  = $_POST['senha'];

                        //
                        $sql = "update colunistas set senha = '$senha' 
                                where email = '$email'";

                        $resultado = mysql_query($sql);
                        if ($resultado){
                            echo "Dados alterados com sucesso.</div>";
                        }
                        else{
                            echo "Erro ao alterar dados.</div>";
                        }
                    }

                    //Se clicar no botão excluir
                    if (isset($_POST['excluir'])){

                        $nome   = $_POST['nome'];
                        $email  = $_POST['email'];
                        $login  = $_POST['login'];
                        $senha  = $_POST['senha'];

                        $sql = "delete from colunistas
                                where email = '$email' and senha = '$senha'";

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
                        $email  = $_POST['email'];
                        $login  = $_POST['login'];
                        $senha  = $_POST['senha'];

                        $sql = "select * from colunistas";

                        $resultado = mysql_query($sql);

                        if (mysql_num_rows($resultado) == 0){
                            echo "Desculpe, sua pesquisa não encontrou resultados.";
                        }
                        else{
                            echo "Resultado da pesquisa por colunistas:"."<br><br>";
                            while ($colunistas = mysql_fetch_array($resultado)){
                                echo "Codigo: ".$colunistas['codigo']."<br>";
                                echo "Email: ".$colunistas['email']."<br>";
                                echo "Nome: ".$colunistas ['nome']."<br><br>";
                                echo "<img src='".$colunistas['foto']."' alt='foto' width='100' height='75'>"."<br><br>";
                            }
                        }
                    }
                ?>
            </div>
            </div>
    </body>
</html>