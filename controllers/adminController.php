<?php
    class adminController extends controller {
        
        
        public function index() {
            $dados = array();
            
            
            $this->loadView('admin/index', $dados);
        }
        public function home() {
               $dados = array();
               
            
            $this->loadTempleteAdmin('admin/home', $dados);
        }
        
        public function inserirAluno() {
                $dados = array();
                if(isset($_POST['btnCadastrar'])) {
                    $nome = addslashes($_POST['nome']);
                    $email = addslashes($_POST['email']);
                    $endereco = addslashes($_POST['endereco']);
                    $bairro = addslashes($_POST['bairro']);
                    $cidade = addslashes($_POST['cidade']);
                    $estado = addslashes($_POST['estado']);
                    $cep = addslashes($_POST['cep']);
                    $cpf = addslashes($_POST['cpf']);
                    $rg = addslashes($_POST['rg']);
                    $orgExp = addslashes($_POST['orgExp']);
                    $dataNascimento = addslashes($_POST['dataNascimento']);
                    $telefone = addslashes($_POST['telefone']);
                    $celular = addslashes($_POST['celular']);
                    $modulo = addslashes($_POST['modulo']);
                    
                    //Seis Meses DATA
                    if(!empty($_POST['P1']) && !empty($_POST['P2']) && !empty($_POST['P3']) && !empty($_POST['P4']) && !empty($_POST['P5']) && !empty($_POST['P6'])) {
                        $data = [addslashes($_POST['P1'])
                        ,addslashes($_POST['P2'])
                        ,addslashes($_POST['P3'])
                        ,addslashes($_POST['P4'])
                        ,addslashes($_POST['P5'])
                        ,addslashes($_POST['P6'])];
                    }
                    //Doze Meses DATA
                    if(!empty($_POST['P1']) && !empty($_POST['P2']) && !empty($_POST['P3']) && !empty($_POST['P4']) && !empty($_POST['P5']) && !empty($_POST['P6']) && !empty($_POST['P7']) && !empty($_POST['P8']) && !empty($_POST['P9']) && !empty($_POST['P10']) && !empty($_POST['P11']) && !empty($_POST['P12'])) {
                        $data = [addslashes($_POST['P1'])
                        ,addslashes($_POST['P2'])
                        ,addslashes($_POST['P3'])
                        ,addslashes($_POST['P4'])
                        ,addslashes($_POST['P5'])
                        ,addslashes($_POST['P6'])
                        ,addslashes($_POST['P7'])
                        ,addslashes($_POST['P8'])
                        ,addslashes($_POST['P9'])
                        ,addslashes($_POST['P10'])
                        ,addslashes($_POST['P11'])
                        ,addslashes($_POST['P12'])];
                    }
                    //Seis Meses VALOR
                    if(!empty($_POST['P1V']) && !empty($_POST['P2V']) && !empty($_POST['P3V']) && !empty($_POST['P4V']) && !empty($_POST['P5V']) && !empty($_POST['P6V'])) {
                        $valor = [addslashes($_POST['P1V'])
                        ,addslashes($_POST['P2V'])
                        ,addslashes($_POST['P3V'])
                        ,addslashes($_POST['P4V'])
                        ,addslashes($_POST['P5V'])
                        ,addslashes($_POST['P6V'])];
                    }
                    //Doze Meses DATA
                    if(!empty($_POST['P1V']) && !empty($_POST['P2V']) && !empty($_POST['P3V']) && !empty($_POST['P4V']) && !empty($_POST['P5V']) && !empty($_POST['P6V']) && !empty($_POST['P7V']) && !empty($_POST['P8V']) && !empty($_POST['P9V']) && !empty($_POST['P10V']) && !empty($_POST['P11V']) && !empty($_POST['P12V'])) {
                        $valor = [addslashes($_POST['P1V'])
                        ,addslashes($_POST['P2V'])
                        ,addslashes($_POST['P3V'])
                        ,addslashes($_POST['P4V'])
                        ,addslashes($_POST['P5V'])
                        ,addslashes($_POST['P6V'])
                        ,addslashes($_POST['P7V'])
                        ,addslashes($_POST['P8V'])
                        ,addslashes($_POST['P9V'])
                        ,addslashes($_POST['P10V'])
                        ,addslashes($_POST['P11V'])
                        ,addslashes($_POST['P12V'])];
                    }
                    
//        
//                    var_dump($data);
//                    var_dump($valor);

                        $inserir = new Alunos;
                       
                        $inserir->adicionarAluno($nome, $email, $endereco, $bairro, $cidade, $estado, $cep, $cpf, $rg, $orgExp, $dataNascimento, $telefone, $celular, $modulo, $data, $valor);
                
                        
                }
  
                
            
            $this->loadTempleteAdmin('admin/inserirAluno', $dados);
        }
        public function listaAlunos() {
            $dados = array();
            $exibeAlunos = new Alunos();
            $dados['alunos'] = $exibeAlunos->exibeAlunos();
           
            if(isset($_POST['pesquisa'])) {
                 $pesquisaAlunos = new Alunos();
                 $pesquisa = $_POST['pesquisa'];
                 
                 $dados['alunos'] = $pesquisaAlunos->pesquisarAlunos($pesquisa);
                 
            }
          
           
            $this->loadTempleteAdmin('admin/listaAlunos', $dados);
            
        }
        public function detalhes($id_aluno) {
            
            $dados = array();
            $detalhes = new Alunos();
            $dados['aluno'] = $detalhes->detalhesAluno($id_aluno);
            $detalhesPagamento = new Alunos();
            $dados['pagamentos'] = $detalhesPagamento->detalhesAlunoPagamentos($id_aluno);
            
          
            
          
               if(isset($_POST['gerarBoleto'])) {
                   $id_pagamento = $_POST['id_pagamento'];
                   //Atualiza valor da parcela
                   //O juros não era modificado no banco de dados
                   $atualizaValor = new Alunos();
                   $atualizaValor->atualizaValor($id_pagamento, $_POST['valor']);
                  
                   
        
                
                $realizarPagamento = new Alunos();
                $realizarPagamento->realizarPagamento($id_pagamento);
//                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=http://localhost/EscolaDeIngles/admin/detalhes/$id_aluno'>";
                
                
                

// Include the main TCPDF library (search for installation path).
require_once('assets/TCPDF-master/tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Escola de Inglês');
$pdf->SetTitle('Recibo');
$pdf->SetSubject('Escola de Inglês');
$pdf->SetKeywords('Escola de Inglês');

$pdf->SetHeaderData('logo.png', PDF_HEADER_LOGO_WIDTH, 'Escola de Inglês'.' 000', "R.Francisco Miglioranza 2345 - Jardim Palestina - FRANCA/SP                          Telefone:.992986075  -  Email:EscoladeIngles@gmail.com");

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
if (@file_exists(dirname(__FILE__).'assets/TCPDF-master/lang/eng.php')) {
    require_once(dirname(__FILE__).'assets/TCPDF-master/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetFont('dejavusans', '', 10);
$pdf->AddPage();


$html = '<table align="center" width="100%" cellpadding="5">
	<tr>
   	  <td width="48%" align="center">Numero do Recibo: '.$_POST['id_pagamento'].'</td>
      <td width="52%" align="center">Valor: '.$_POST['valor'].' Reais</td>
    </tr>
    <tr>
    	<td colspan="2" align="right" valign="middle">Recebemos de '.$_POST['nome'] .' a quantia de '.$_POST['valor'].' Reais Corespondente a(o) '.$_POST['modulo'].' da Escola de Inglês e para clareza firmamos o presente.</td>
  </tr>
    <tr>
    	<td align="center">Data de Vencimento:'.$_POST['data'].'</td>
    	<td align="center">Data do Pagamento:'.date('d/m/Y').'</td>
    </tr>
    <tr>
    	<td width="48%" align="center"> Assinatura: ___________________</td>
        <td align="center">CPF: '.$_POST['cpf'].'</td>
    </tr>
</table>';

// output the HTML content

$pdf->writeHTML($html, true, false, true, false, '');



//Abre o PDF no navegador
$pdf->Output($id_pagamento.'.pdf', 'I');
//Salva o PDF
$pdf->Output(__DIR__ . '/../arquivos/recibos/'.$id_pagamento.'.pdf', 'F');
exit();

//============================================================+
// END OF FILE
                             
               }
        
            
            
            $this->loadTempleteAdmin('admin/detalhesAluno', $dados);
            
        }

        
        public function mensalidadesAtrasadas() {
            $dados = array();
            $dataAtual = date('Y-m-d');
           if(isset($_POST['consultar'])) {
               if(!empty($_POST['ate'])  && !empty($_POST['de'])) {
                    $ate = $_POST['ate'];
                    $de = $_POST['de'];
                } elseif (!empty ($_POST['de']) && empty($_POST['ate'])) {
                    $de = $_POST['de'];
                    $ate = $dataAtual;
                } elseif (empty ($_POST['de']) && !empty($_POST['ate'])) {
                    $de = '2015-01-01';
                    $ate = $_POST['ate'];  
            } else {
                $de = '2015-01-01';
                $ate = $dataAtual;
            }
               
           } else {
                $de = '2015-01-01';
                $ate = $dataAtual;
           }
            $mensalidadesAtrasadas = new Alunos();
            $dados['mensalidadesAtrasadas'] = $mensalidadesAtrasadas->mensalidadesAtrasadas($de, $ate, $dataAtual);
            
            $this->loadTempleteAdmin('admin/mensalidadesAtrasadas', $dados);
            
        }

        public function relatoriosMensais() {
            $dados = array();
            $dataAtual = date('Y-m-d');
            if(isset($_POST['data']) && !empty('data')) {
                
               $data = explode("/", $_POST['data']);
               $de = $data[0];
               $ate = $data[1]; 
            } else {
               $ano = date('Y');
               $mes = date('m');
              
               $de = $ano."-".$mes."-01";
               
                $mes = $mes + 1;
                if($mes < 10) {
                    $mes = "0".$mes;
                }
                if($mes > 12) {
                    $mes = "01";
                    $ano++;
                }
                $ate = $ano."-".$mes."-01";

            }
            
            $dados['de_Ate'] = [$de,$ate];
            
            
            $qtdMensalidadesPagas = new Relatorios();
            $dados['qtdMensalidadesPagas'] = $qtdMensalidadesPagas->qtdMensalidadesPagas($de, $ate);
            
            $qtdMensalidadesNPagas = new Relatorios();
            $dados['qtdMensalidadesNPagas'] = $qtdMensalidadesNPagas->qtdMensalidadesNPagas($de, $ate);
            
            $qtdMensalidadesAtrasadas = new Relatorios();
            $dados['qtdMensalidadesAtrasadas'] = $qtdMensalidadesAtrasadas->qtdMensalidadesAtrasadas($de, $ate, $dataAtual);
            
            $qtdMensalidades = new Relatorios();
            $dados['qtdMensalidades'] = $qtdMensalidades->qtdMensalidades($de, $ate);
            
            $valorEsperadaMensal = new Relatorios();
            $dados['valorEsperadaMensal'] = $valorEsperadaMensal->valorEsperadaMensal($de, $ate);

            $receitaMensalAtual = new Relatorios();
            $dados['receitaMensalAtual'] = $receitaMensalAtual->receitaMensalAtual($de, $ate);

            $this->loadTempleteAdmin('admin/relatoriosMensais', $dados);
        }
        public function relatoriosGerais() {
            $dados = array();
            $mesAtual = date("m");
            
            $anoAtual = date("Y");
            //MESES ANTERIORES
            $mesesA = [$mesAtual - 12, $mesAtual - 11, $mesAtual - 10, $mesAtual - 9, $mesAtual - 8, $mesAtual - 7,
                      $mesAtual - 6, $mesAtual - 5, $mesAtual - 4, $mesAtual - 3, $mesAtual - 2, $mesAtual - 1];
                      
            $x = 0;
                  while ($x < 12) {
                    if ($mesesA[$x] <= 0) {
                      $mesesA[$x] = 12 + $mesesA[$x];
                      $anoA[$x] = $anoAtual - 1;
                      $anoA[$x] = (string)$anoA[$x];
                    } else {
                        $anoA[$x] = $anoAtual;
                    }
                    if ($mesesA[$x] < 10) {
                        $mesesA[$x] = "0".$mesesA[$x];
                    } else{
                        $mesesA[$x] = (string)$mesesA[$x];
                    }
                    
                   
                    $x++;
                  }
              $dados['anoA'] = $anoA;
              $dados['mesesA'] = $mesesA;
              //FIM MESES ANTERIORES
              //
              //
              //MESES SEGUINTES
            $mesesS = [$mesAtual + 1, $mesAtual + 2, $mesAtual + 3, $mesAtual + 4, $mesAtual + 5, $mesAtual + 6, $mesAtual + 7, $mesAtual + 8];
                      
            $x = 0;
                  while ($x < 8) {
                    if ($mesesS[$x] > 13) {
                      $mesesS[$x] = $mesesS[$x] - 12;
                      $anoS[$x] = $anoAtual + 1;
                      $anoS[$x] = (string)$anoS[$x];
                    } else {
                        $anoS[$x] = $anoAtual;
                    }
                    if ($mesesS[$x] < 10) {
                        $mesesS[$x] = $mesesA[$x];
                    } else{
                        $mesesS[$x] = (string)$mesesA[$x];
                    }
                    
                   
                    $x++;
                  }
              $dados['anoS'] = $anoS;
              $dados['mesesS'] = $mesesS;
             

              //MESES SEGUINTES
              
              
              $receita = new Relatorios();
              $despesa = new Relatorios();
              $anoP = $anoAtual;
              $mesP = $mesAtual + 1;
              if($mesAtual > 12) {
                  $anoP = $anoP - 1;
                  $mesP = 1;
              }
             
             
             //RECEITA 
              $dados['receitaA'] = $receita->receitaMensalAtual($anoA[0].'-'.$mesesA[0].'-01', $anoA[1].'-'.$mesesA[1].'-01');
              $dados['receitaB'] = $receita->receitaMensalAtual($anoA[1].'-'.$mesesA[1].'-01', $anoA[2].'-'.$mesesA[2].'-01');
              $dados['receitaC'] = $receita->receitaMensalAtual($anoA[2].'-'.$mesesA[2].'-01', $anoA[3].'-'.$mesesA[3].'-01');
              $dados['receitaD'] = $receita->receitaMensalAtual($anoA[3].'-'.$mesesA[3].'-01', $anoA[4].'-'.$mesesA[4].'-01');
              $dados['receitaE'] = $receita->receitaMensalAtual($anoA[4].'-'.$mesesA[4].'-01', $anoA[5].'-'.$mesesA[5].'-01');
              $dados['receitaF'] = $receita->receitaMensalAtual($anoA[5].'-'.$mesesA[5].'-01', $anoA[6].'-'.$mesesA[6].'-01');
              $dados['receitaG'] = $receita->receitaMensalAtual($anoA[6].'-'.$mesesA[6].'-01', $anoA[7].'-'.$mesesA[7].'-01');
              $dados['receitaH'] = $receita->receitaMensalAtual($anoA[7].'-'.$mesesA[7].'-01', $anoA[8].'-'.$mesesA[8].'-01');
              $dados['receitaI'] = $receita->receitaMensalAtual($anoA[8].'-'.$mesesA[8].'-01', $anoA[9].'-'.$mesesA[9].'-01');
              $dados['receitaJ'] = $receita->receitaMensalAtual($anoA[9].'-'.$mesesA[9].'-01', $anoA[10].'-'.$mesesA[10].'-01');
              $dados['receitaK'] = $receita->receitaMensalAtual($anoA[10].'-'.$mesesA[10].'-01', $anoA[11].'-'.$mesesA[11].'-01');
              $dados['receitaAtual'] = $receita->receitaMensalAtual($anoAtual.'-'.$mesAtual.'-01', $anoP.'-'.$mesP.'-01');
              $dados['receitaL'] = $receita->receitaMensalAtual($anoS[0].'-'.$mesesS[0].'-01', $anoS[1].'-'.$mesesS[1].'-01');
              $dados['receitaM'] = $receita->receitaMensalAtual($anoS[1].'-'.$mesesS[1].'-01', $anoS[2].'-'.$mesesS[2].'-01');
              $dados['receitaN'] = $receita->receitaMensalAtual($anoS[2].'-'.$mesesS[2].'-01', $anoS[3].'-'.$mesesS[3].'-01');
              $dados['receitaO'] = $receita->receitaMensalAtual($anoS[3].'-'.$mesesS[3].'-01', $anoS[4].'-'.$mesesS[4].'-01');
              $dados['receitaP'] = $receita->receitaMensalAtual($anoS[4].'-'.$mesesS[4].'-01', $anoS[5].'-'.$mesesS[5].'-01');
              $dados['receitaQ'] = $receita->receitaMensalAtual($anoS[5].'-'.$mesesS[5].'-01', $anoS[6].'-'.$mesesS[6].'-01');
              $dados['receitaR'] = $receita->receitaMensalAtual($anoS[6].'-'.$mesesS[6].'-01', $anoS[7].'-'.$mesesS[7].'-01');

              //DESPESA
              $dados['despesaA'] = $despesa->despesaMensalAtual($anoA[0].'-'.$mesesA[0].'-01', $anoA[1].'-'.$mesesA[1].'-01');
              $dados['despesaB'] = $despesa->despesaMensalAtual($anoA[1].'-'.$mesesA[1].'-01', $anoA[2].'-'.$mesesA[2].'-01');
              $dados['despesaC'] = $despesa->despesaMensalAtual($anoA[2].'-'.$mesesA[2].'-01', $anoA[3].'-'.$mesesA[3].'-01');
              $dados['despesaD'] = $despesa->despesaMensalAtual($anoA[3].'-'.$mesesA[3].'-01', $anoA[4].'-'.$mesesA[4].'-01');
              $dados['despesaE'] = $despesa->despesaMensalAtual($anoA[4].'-'.$mesesA[4].'-01', $anoA[5].'-'.$mesesA[5].'-01');
              $dados['despesaF'] = $despesa->despesaMensalAtual($anoA[5].'-'.$mesesA[5].'-01', $anoA[6].'-'.$mesesA[6].'-01');
              $dados['despesaG'] = $despesa->despesaMensalAtual($anoA[6].'-'.$mesesA[6].'-01', $anoA[7].'-'.$mesesA[7].'-01');
              $dados['despesaH'] = $despesa->despesaMensalAtual($anoA[7].'-'.$mesesA[7].'-01', $anoA[8].'-'.$mesesA[8].'-01');
              $dados['despesaI'] = $despesa->despesaMensalAtual($anoA[8].'-'.$mesesA[8].'-01', $anoA[9].'-'.$mesesA[9].'-01');
              $dados['despesaJ'] = $despesa->despesaMensalAtual($anoA[9].'-'.$mesesA[9].'-01', $anoA[10].'-'.$mesesA[10].'-01');
              $dados['despesaK'] = $despesa->despesaMensalAtual($anoA[10].'-'.$mesesA[10].'-01', $anoA[11].'-'.$mesesA[11].'-01');
              $dados['despesaAtual'] = $despesa->despesaMensalAtual($anoAtual.'-'.$mesAtual.'-01', $anoP.'-'.$mesP.'-01');
              $dados['despesaL'] = $despesa->despesaMensalAtual($anoS[0].'-'.$mesesS[0].'-01', $anoS[1].'-'.$mesesS[1].'-01');
              $dados['despesaM'] = $despesa->despesaMensalAtual($anoS[1].'-'.$mesesS[1].'-01', $anoS[2].'-'.$mesesS[2].'-01');
              $dados['despesaN'] = $despesa->despesaMensalAtual($anoS[2].'-'.$mesesS[2].'-01', $anoS[3].'-'.$mesesS[3].'-01');
              $dados['despesaO'] = $despesa->despesaMensalAtual($anoS[3].'-'.$mesesS[3].'-01', $anoS[4].'-'.$mesesS[4].'-01');
              $dados['despesaP'] = $despesa->despesaMensalAtual($anoS[4].'-'.$mesesS[4].'-01', $anoS[5].'-'.$mesesS[5].'-01');
              $dados['despesaQ'] = $despesa->despesaMensalAtual($anoS[5].'-'.$mesesS[5].'-01', $anoS[6].'-'.$mesesS[6].'-01');
              $dados['despesaR'] = $despesa->despesaMensalAtual($anoS[6].'-'.$mesesS[6].'-01', $anoS[7].'-'.$mesesS[7].'-01');

              




        $this->loadTempleteAdmin('admin/relatoriosGerais', $dados);
        }
        public function inserirReposicao($id_aluno) {
            $dados = array();
            
            if(isset($_POST['inserir']) && !empty($_POST['dataReposicao']) && !empty($_POST['dataVencimento']) && !empty($_POST['valor'])) {
                $dataReposicao = explode("-", $_POST['dataReposicao']);
                $dataReposicao = $dataReposicao[2]."/".$dataReposicao[1]."/".$dataReposicao[0];
                $dataVencimento = $_POST['dataVencimento'];
                $valor = $_POST['valor'];
                echo $dataReposicao."-".$dataVencimento."-".$valor;
                $inserirReposicao = new Alunos();
                $inserirReposicao->inserirReposicao($id_aluno,$dataReposicao, $dataVencimento, $valor);
                if($inserirReposicao == true)
                    $dados['msg'] = "Sucesso! <a href='../detalhes/$id_aluno'>Clique aqui para retornar</a>";
            }
            $this->loadTempleteAdmin('admin/inserirReposicao', $dados);
        }
        public function inserirDespesa() {
            $dados = array();
            if(isset($_POST['inserir']) && !empty($_POST['nome']) && !empty($_POST['data']) && !empty($_POST['valor'])) {
                $nome = $_POST['nome'];
                $data = $_POST['data'];
                $valor = $_POST['valor'];
                //TIRA O PONTO(.)
                $valor = explode(".", $valor);
                $valor = $valor[0].$valor[1];
                //TROCA A VIRGULA PELO PONTO
                $valor = explode(",", $valor);
                $valor = $valor[0].".".$valor[1];
                
                echo $valor;

                
//                
//                $inserirDespesa = new Despesas();
//                $inserirDespesa->inserirDespesa($nome, $data, $valor);
//                if($inserirDespesa == TRUE) {
//                    $dados['msg'] = "Despesa ".$nome." inserida com sucesso!!!";
//                }
            }
            
            $this->loadTempleteAdmin('admin/inserirDespesa', $dados);
            
        }
        public function editarAluno($id_aluno) {
            $dados = array();
            
            $dadosAluno = new Alunos();
            $dados['aluno'] = $dadosAluno->detalhesAluno($id_aluno);
            

            
            if(isset($_POST['atualizar'])) {
                    $nome = addslashes($_POST['nome']);
                    $email = addslashes($_POST['email']);
                    $endereco = addslashes($_POST['endereco']);
                    $bairro = addslashes($_POST['bairro']);
                    $cidade = addslashes($_POST['cidade']);
                    $estado = addslashes($_POST['estado']);
                    $cep = addslashes($_POST['cep']);
                    $cpf = addslashes($_POST['cpf']);
                    $rg = addslashes($_POST['rg']);
//                    $orgExp = addslashes($_POST['orgExp']);
                    $data = addslashes($_POST['data']);
                    $telefone = addslashes($_POST['telefone']);
                    $celular = addslashes($_POST['celular']);
                    $modulo = addslashes($_POST['modulo']);
                    
                $editarAluno = new Alunos();
                $editarAluno->editarAluno($id_aluno, $nome, $email, $endereco, $bairro, $cidade, $estado, $cep, $cpf, $rg, $data, $telefone, $celular, $modulo);
                
                if($editarAluno == true) {
                    $dados['msg'] = "Atualizado com Sucesso!! aperte F5 para visualizar";
                }
            }
            
             $this->loadTempleteAdmin('admin/editarAluno', $dados);
        }
        
        public function editarFaturas($id_aluno) {
            $dados = array();
            $pagamentos = new Alunos();
            $dados['pagamentos'] = $pagamentos->detalhesAlunoPagamentos($id_aluno);
            
            $this->loadTempleteAdmin('admin/editarFaturas', $dados);
            
        }
        
        public function editarFatura($id_pagamento) {
            $dados = array();
            $selecionar = new Alunos();
            $dados['pagamento'] = $selecionar->selecionarFatura($id_pagamento);
               
            if(isset($_POST['atualizar'])) {
                    $data =  $_POST['data'];
                    $condicao = $_POST['condicao'];
                    $valor = $_POST['valor'];
                    
                //TIRA O PONTO(.)
                    $valor = explode(".", $valor);
                    if(isset($valor[1])) {
                        $valor = $valor[0].$valor[1];
                    }else {
                        $valor = $valor[0];
                    }
                    //TROCA A VIRGULA PELO PONTO
                    $valor = explode(",", $valor);
               
                    if(isset($valor[1])) {
                    $valor = $valor[0].".".$valor[1];
                } else {
                    $valor = $valor[0];
                }

                    
                    
                    $atualiza = new Alunos();
                    $atualiza->editarFatura($id_pagamento, $data, $condicao, $valor);

                   if($atualiza == TRUE) {
                        $dados['msg'] = "Atualizada com sucesso!! Aperte F5 para visualizar";
                    }
               }

                   
            $this->loadTempleteAdmin('admin/editarFatura', $dados);
            
        }
    }