<?php
$conectar = mysqli_connect('localhost','root','', 'biofertil');


?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Login</title>
        <link rel="stylesheet" type= "text/css" href="css/stylelogin.css">
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
                        $sql = "SELECT user, senha FROM usuarios
                                WHERE user = '$login' AND senha = '$senha'";
                        $resultado = mysqli_query($conectar ,$sql);

                        if (mysqli_num_rows($resultado) <> 0){  
                            $usuarios = mysqli_fetch_array($resultado);
                            if ($usuarios["user"] !="")  {
                                $_SESSION['user'] = $usuarios['user'];
                                $_SESSION['senha'] = $usuarios['senha'];
                                header("Location: ??");   }
                        }
                        else{
                            echo "Usuário ou senha inválidos!";
                        }
                    }
            ?>
            </div>
</html>
