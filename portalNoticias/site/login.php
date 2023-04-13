<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db('portal');

?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Cadastro de Matérias</title>
        <link rel="stylesheet" type= "text/css" href="styles.css">
        <html lang="pt-br">
    </head>

    <body>
        <div>
        <form name="formulario" method="post" action="login.php">
            <div id="form">
                <h2>Sign IN</h2>
                <div class="input-forms">
                    <!-- Text inputs -->
                    <input required type="text" name="user" id="user" size=20 class="input">
                    <label for="user">User: </label>
                </div>

                <div class="input-forms">
                    <input required type="password" name="senha" Senhasenha" Senha=20 class="input">
                    <label for="senha">Senha: </label>
                </div>

                <div>
                <!-- Botões -->
                <input type="submit" name="entrar" id="entrar" value="Entrar" class = "buttons">
                </div>

            </div> 
            <div class="resultados">
                <?php
                    if (isset($_POST['entrar'])){
                        $login   = $_POST['user'];
                        $senha   = $_POST['senha'];
                        $sql = "SELECT login, senha FROM colunistas
                                WHERE login = '$login' AND senha = '$senha'";
                        $resultado = mysql_query($sql);

                        if (mysql_num_rows($resultado) <> 0){  
                            $colunistas = mysql_fetch_array($resultado);
                            if ($colunistas["login"] !="")  {
                                $_SESSION['login'] = $colunistas['login'];
                                $_SESSION['senha'] = $colunistas['senha'];
                                header("Location: menu.html");   }
                        }
                        else{
                            echo "Usuário ou senha inválidos!";
                        }
                    }
            ?>
            </div>
</html>
