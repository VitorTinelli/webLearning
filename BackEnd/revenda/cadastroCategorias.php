<?php
//conectar com o servidor: localhost,root,""
$servidor = mysql_connect('localhost','root','') ;

//conectar com o banco: revenda
$banco = mysql_select_db('revenda');

//Se clicar no botão gravar
if (isset($_POST['gravar'])){
    //receber as variaveis do HTML:
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];

    //comando do SQL (INSERT):
    $sql = "insert into categorias (codigo, nome) 
            values ('$codigo', '$nome')";

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
    $sql = "update categorias set nome = '$nome' 
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

    $sql = "delete from categorias
            where codigo = '$codigo' or nome = '$nome'";

    $resultado = mysql_query($sql);
    if ($resultado){
        echo "Dados excluidos com sucesso.";
    }
    else{
        echo "Erro ao excluir dados.";
    }
}

if (isset($_POST['pesquisar'])){
    $codigo = $_POST['codigo'];
    $nome   = $_POST['nome'];

    $sql = "select * from categorias";

    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) == 0){
        echo "Desculpe, sua pesquisa não encontrou resultados.";
    }
    else{
        echo "Resultado da pesquisa por categorias:"."<br><br>";
        while ($categorias = mysql_fetch_array($resultado)){
            echo "Codigo: ".$categorias['codigo']."<br><br>";
            echo "Nome: ".$categorias ['nome']."<br><br>";
        }
    }
}

?>