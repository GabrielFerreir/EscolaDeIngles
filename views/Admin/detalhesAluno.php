<?php
/*P1 = explode('-', $pagamentos['P1']);
$P1Data = $P1[2] . "/" . $P1[1] . "/" . $P1[0];
$P2 = explode('-', $pagamentos['P2']);
$P2Data = $P2[2] . "/" . $P2[1] . "/" . $P2[0];
$P3 = explode('-', $pagamentos['P3']);
$P3Data = $P3[2] . "/" . $P3[1] . "/" . $P3[0];
$P4 = explode('-', $pagamentos['P4']);
$P4Data = $P4[2] . "/" . $P4[1] . "/" . $P4[0];
$P5 = explode('-', $pagamentos['P5']);
$P5Data = $P5[2] . "/" . $P5[1] . "/" . $P5[0];
$P6 = explode('-', $pagamentos['P6']);
$P6Data = $P6[2] . "/" . $P6[1] . "/" . $P6[0];

function geraTimestamp($data) {
    $partes = explode('-', $data);
return mktime(0, 0, 0, $partes[1], $partes[2], $partes[0]);

}
 */
?>



<html>
    <head>
        <title><?=$aluno['nome'];?> - Detalhes do aluno</title>
        <style>
            .detalhe {width: 600px; height: 40px; background-color: #FFF; margin: 0 auto;}
            .tag{width: 30%; height: 100%; height: 40px;; line-height: 40px; text-align: center; float: left; background-color: #EEE;}
            .cont{width: 70%; float: left; height: 40px;; line-height: 40px; text-align: center; background-color: #CCC;}
            
        </style>
    </head>

    <body>
        <br/>
        <table style="text-align: center;">
            <tr>
                <td width="200px"><a href="<?=BASE_URL;?>/admin/inserirReposicao/<?=$aluno['id']?>">Adicionar Reposição</a></td>
                <td width="200px"><a href="<?=BASE_URL;?>/admin/editarAluno/<?=$aluno['id']?>">Editar Dados</a></td>
                <td width="200px"><a href="<?=BASE_URL;?>/admin/editarFaturas/<?=$aluno['id']?>">Editar Faturas</a></td>
            </tr>
        </table>
        <br/>
        <b>Detalhes Aluno</b>
        <br/>
        
        
              <h2 align="center"><?= $aluno['nome'];?></h2>
            
              <div class="detalhe">
                  <label class="tag">Email:</label>
                  <label class="cont"><?= $aluno['email']; ?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">Endereço:</label>
                  <label class="cont"><?= $aluno['endereco']; ?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">Bairro:</label>
                  <label class="cont"><?= $aluno['bairro']; ?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">Cidade:</label>
                  <label class="cont"><?= $aluno['cidade']; ?></label>
              </div>
              <div class="detalhe">
                  <label class="tag">Estado:</label>
                  <label class="cont"><?= $aluno['estado']; ?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">CEP:</label>
                  <label class="cont"><?= $aluno['cep']; ?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">CPF:</label>
                  <label class="cont"><?= $aluno['cpf']; ?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">RG:</label>
                  <label class="cont"><?= $aluno['rg']; ?> - <?= $aluno['orgExp'];?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">Data de Nascimento:</label>
                  <label class="cont"><?= $aluno['dataNascimento']; ?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">Telefone:</label>
                  <label class="cont"><?= $aluno['telefone']; ?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">Celular:</label>
                  <label class="cont"><?= $aluno['celular']; ?></label>
              </div>
              
              <div class="detalhe">
                  <label class="tag">Modulo:</label>
                  <label class="cont"><?= $aluno['modulo']; ?></label>
              </div>
              <b>Pagamentos</b>

        <table  cellspacing=0 cellpadding=0 width='100%'  style="text-align: center;">
            <?php
//            var_dump($pagamentos); ?>
            <table width="100%" style="text-align: center">
                <tbody bgcolor="#EEE">
                <td>Tipo</td>
                <td>Mensalidade</td>
                <td>Data</td>
                <td>Condição</td>
                <td>Valor</td>
                <td>Ação</td>
                </tbody>
                <?php
                //GERA TIME STRAMP
                function geraTimestamp($data) {
                $partes = explode('-', $data);
                return mktime(0, 0, 0, $partes[1], $partes[2], $partes[0]);
                }
                //FIM GERA TIME STRAMP
                    foreach ($pagamentos as $pagamento) :?>
                <tr>
                    <?php
                    //
                    $dataAtual = date("Y-m-d");
                    //Formatando a Data
                    $dataFormatada = explode("-", $pagamento['data']);
                    $dataFormatada = $dataFormatada[2]."/".$dataFormatada[1]."/".$dataFormatada[0];
                    //Definindo condicao atual
                    if($pagamento['condicao'] == 1){
                        $condicao = "Pago";
                    } elseif ($pagamento['condicao'] == 0 && $pagamento['data'] >= $dataAtual) {
                        $condicao = "Aguardando Pagamento";
                    } else {
                        $condicao = "Atrasado";
                    }
                    //Gerando Dias de Atraso
                    $timeDataAtual = geraTimestamp($dataAtual);
                    $time = geraTimestamp($pagamento['data']);
                    $diferenca = $timeDataAtual - $time;
                    $diasDeAtraso = (int)floor( $diferenca / (60 * 60 * 24));
                    if ($diasDeAtraso < 0) {
                        $diasDeAtraso = 0;
                    }
                    
                    //GERANDO VALOR COM JUROS
                    $semanasDeAtraso = (int)($diasDeAtraso / 7);
                    $valor = $pagamento['valor'] + ($semanasDeAtraso * 10);
                    //VALOR CASO A MENSALIDADE ESTEJA PAGA
                    if($pagamento['condicao'] == 1) {
                        $valor = $pagamento['valor'];

                    }
                    ?>
                   
                    <?php
                    //REPOSIÇÃO
                        if($pagamento['mensalidade'] == 0) {
                            $pagamento['mensalidade'] = "---";
                        }
                    ?>
                    <td><?=$pagamento['tipo'];?></td>
                    <td><?=$pagamento['mensalidade'];?></td>
                    <td><?=$dataFormatada?></td>
                    <td><?=$condicao;?></td>
                    
                    <td><?=$valor = number_format( $valor , 2, ',', '.');?></td> 
                    
                    <td width="100px">
                        <?php if($pagamento['condicao'] == 0) { ?>
                        <form method="POST">
                        <input name="nome" type="hidden" value="<?=$aluno['nome'];?>"/>
                        <input name="cpf" type="hidden" value="<?=$aluno['cpf'];?>"/>
                        <input name="modulo" type="hidden" value="<?=$aluno['modulo'];?>"/>
                        <input name="data" type="hidden" value="<?=$dataFormatada;?>"/>
                        <input name="valor" type="hidden" value="<?=$valor;?>"/>
                        <input name="id_pagamento" type="hidden" value="<?=$pagamento['id_pagamento'];?>"/>
                                    
                        <input type="submit" name="gerarBoleto" value="Pagar"/>
                        </form>
                        <?php } elseif ($pagamento['condicao'] == 1) { ?>
                        <a href="<?=BASE_URL;?>/arquivos/recibos/<?=$pagamento['id_pagamento']?>.pdf" target="new_blank">Ver Boleto</a>
                        <?php } ?>
                        
                        
                    </td>
                    
                </tr>
                <?php endforeach; ?>
            
            
            
        </table>
    </body>

</html>