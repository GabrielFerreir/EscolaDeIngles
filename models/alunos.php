<?php

class Alunos extends model {

    public function adicionarAluno($nome, $email,$endereco,$bairro,$cidade,$estado,$cep,$cpf,$rg,$orgExp,$dataNascimento,$telefone,$celular,$modulo,$data, $valor) {
          
        $sql = "INSERT INTO alunos SET nome = '$nome', email = '$email', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep', cpf = '$cpf', rg = '$rg', orgExp = '$orgExp', dataNascimento = '$dataNascimento', telefone = '$telefone', celular = '$celular', modulo = '$modulo'";       
        $sql = $this->db->query($sql);
            if($sql == true) {
                                $sqlLastId = "SELECT id FROM alunos ORDER BY id DESC LIMIT 1";
                                $array = array();
                                $sqlLastId = $this->db->query($sqlLastId);
                                if ($sqlLastId->rowCount() > 0) {
                                $array = $sqlLastId->fetchAll();
                                $lastid = $array[0]['id']; 
                                }
                                if(isset($lastid)) {
                                    $i = 0;
                                    while(isset($data[$i]) && isset($valor[$i])) {
                                        $mensalidade = $i + 1;
                                        $sql2 = "INSERT INTO pagamentos set id_alunos = '$lastid', tipo = 'Mensalidade', mensalidade = '$mensalidade', data = '$data[$i]', condicao = '0', valor = '$valor[$i]'";
                                        $sql2 = $this->db->query($sql2);
                                        $i++;
                                           
                                    }
                                     echo 'Inserido com sucesso!';       
                                }
            } else {
           echo "Erro";
        } 
    }
    
    public function exibeAlunos() {
        $array = array();

        $sql = "SELECT * FROM alunos ORDER BY nome ASC ";

        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {

            $array = $sql->fetchAll();
        }

        return $array;
    }
    public function pesquisarAlunos($pesquisa) {
        $array = array();
             $sql = "SELECT * FROM alunos WHERE nome LIKE '%$pesquisa%' ORDER BY nome ASC ";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array; 
    }

    public function detalhesAluno($id_aluno) {
        $array = array();
             $sql = "SELECT * FROM alunos WHERE id = '$id_aluno'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array; 
    }
    public function detalhesAlunoPagamentos($id_aluno) {
               $array = array();
             $sql = "SELECT pagamentos.id_pagamento, pagamentos.tipo, pagamentos.mensalidade, pagamentos.data, pagamentos.condicao, pagamentos.valor FROM alunos JOIN pagamentos ON alunos.id = pagamentos.id_alunos WHERE alunos.id = '$id_aluno' ORDER BY pagamentos.data ASC;";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array; 
    }
    
    public function realizarPagamento($id_pagamento) {
        $sql = "UPDATE pagamentos SET condicao = '1' WHERE id_pagamento = $id_pagamento";
//        echo $sql;
        $sql = $this->db->query($sql);
    }
    public function atualizaValor($id_pagamento, $valor) {
        $sql = "UPDATE pagamentos SET valor = '$valor' WHERE id_pagamento = $id_pagamento";
        $sql = $this->db->query($sql);
    }
    
    public function mensalidadesAtrasadas($de, $ate, $dataAtual) {
        $sql = "SELECT alunos.nome, alunos.id,pagamentos.id_pagamento, pagamentos.data, pagamentos.condicao FROM alunos JOIN pagamentos ON alunos.id = pagamentos.id_alunos WHERE pagamentos.condicao = 0 AND pagamentos.data < '$dataAtual' AND pagamentos.data >= '$de' AND pagamentos.data <= '$ate' ORDER BY pagamentos.data ASC";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {

            $array = $sql->fetchAll();
        }

        return $array;
    }
    
    public function inserirReposicao($id_aluno, $dataReposicao, $dataVencimento, $valor) {
         
            $sql = "INSERT INTO pagamentos set id_alunos = '$id_aluno', tipo = 'Reposição: $dataReposicao', mensalidade = '0', data = '$dataVencimento', condicao = '0', valor = '$valor'";
            $sql = $this->db->query($sql);

            if($sql == true) {
                return true;
            }
            
        
    }
        public function editarAluno($id_aluno, $nome, $email, $endereco, $bairro, $cidade, $estado, $cep, $cpf, $rg, $data, $telefone, $celular, $modulo) {
        $sql = "UPDATE alunos SET nome = '$nome', email = '$email', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep', cpf = '$cpf', rg = '$rg', dataNascimento = '$data', telefone = '$telefone', celular = '$celular', modulo = '$modulo' WHERE id = $id_aluno";
//        echo $sql;
        $sql = $this->db->query($sql);
            if($sql == true) {
                return true;
            }
    }
    public function selecionarFatura($id_pagamento) {
        $sql = "SELECT * FROM pagamentos WHERE id_pagamento = '$id_pagamento'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {

            $array = $sql->fetch();
        }

        return $array;
        
    }
    public function editarFatura($id_pagamento, $data, $condicao, $valor) {
        $sql = "UPDATE pagamentos SET data = '$data', condicao = '$condicao', valor = '$valor' WHERE id_pagamento = '$id_pagamento'";
        $sql = $this->db->query($sql);
            
        if($sql == true) {
                return true;
        }    
    }
    
    
    
}


