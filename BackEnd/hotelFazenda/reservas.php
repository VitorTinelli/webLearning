<?php header('Content-type: text/html; charset= utf-8');
//capturar as variaveis do HTML

//hospede
$nome       = $_POST['nome'];
$end        = $_POST['end']; //endereco
$bairro     = $_POST['bairro'];
$cid        = $_POST['cid']; //cidade
$est        = $_POST['est']; //estado
$pais       = $_POST['pais'];
$cep        = $_POST['cep'];
$cpf        = $_POST['cpf'];
$tel        = $_POST['tel']; //telefone
$cel        = $_POST['cel']; //celular
$sex        = $_POST['sex']; //sexo
$dnas       = $_POST['dnas']; //data nascimento

//reserva
$dchein     = $_POST['dchein']; //data check-in
$hchein     = $_POST['hchein']; //hora
$dcheou     = $_POST['dcheou']; //data check-out
$hcheou     = $_POST['hcheou']; //hora
$tipquart   = $_POST['tipquart'];   
$nadult     = $_POST['nadult'];
$ncria      = $_POST['ncria']; //numero de criança
$servicos   = $_POST['servicos'];


//verificar se campo foi preenchido:

if ($nome == ""){
    echo "Campo NOME deve ser preenchido...";
}
//ambos funcionam igual
if (empty($cel)){
    echo "Campo CELULAR deve ser preenchido...";
}

$mensagem = 'Nome: '. $nome. 'Endereco: '. $end. 'Cidade: '. $cid.
'Estado: '. $est. 'Telefone: '. $tel. 'Celular: '.$cel. 'CPF: '. $cpf.
'Data check-in: '. $dchein. 'Data Check-Out: '. $dcheou. 'Tipo do Quarto: '. $tipquart.
'Número de Adultos: '. $nadult. 'Número de crianças: '. $ncria;

mail("vitor.mtinelli@gmail.com", "Teste", $mensagem);


echo "Dados ENVIADOS com sucesso... Em breve entraremos em contato!"
?>

  


