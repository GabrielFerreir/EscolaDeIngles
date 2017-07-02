<?php

class Relatorios extends model {

    public function qtdMensalidadesPagas($de, $ate) {
        $sql="SELECT COUNT(pagamentos.id_pagamento) FROM pagamentos WHERE pagamentos.condicao = 1 AND pagamentos.data >= '$de' AND pagamentos.data < '$ate'";

        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {

            $array = $sql->fetch();
        }

        return $array;
    }
        public function qtdMensalidadesNPagas($de, $ate) {
        $sql="SELECT COUNT(pagamentos.id_pagamento) FROM pagamentos WHERE pagamentos.condicao = 0 AND pagamentos.data >= '$de' AND pagamentos.data < '$ate'";

        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {

            $array = $sql->fetch();
        }

        return $array;
    }
        public function qtdMensalidadesAtrasadas($de, $ate, $dataAtual) {
        $sql = "SELECT COUNT(pagamentos.id_pagamento) FROM pagamentos WHERE pagamentos.condicao = 0 AND pagamentos.data >= '$de' AND pagamentos.data < '$ate' AND pagamentos.data < '$dataAtual'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {

            $array = $sql->fetch();
        }

        return $array;
    }
        public function qtdMensalidades($de, $ate) {
        $sql = "SELECT COUNT(pagamentos.id_pagamento) FROM pagamentos WHERE pagamentos.data >= '$de' AND pagamentos.data < '$ate'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {

            $array = $sql->fetch();
        }

        return $array;
    }
        public function valorEsperadaMensal($de, $ate) {
        $sql = "SELECT SUM(pagamentos.valor) FROM pagamentos WHERE pagamentos.data >= '$de' AND pagamentos.data < '$ate'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {

            $array = $sql->fetch();
        }

        return $array;
    }
        public function receitaMensalAtual($de, $ate) {
        $sql = "SELECT SUM(pagamentos.valor) FROM pagamentos WHERE pagamentos.condicao = 1 AND pagamentos.data >= '$de' AND pagamentos.data < '$ate'";
        $sql = $this->db->query($sql);
        
        
        if ($sql->rowCount() > 0) {

            $array = $sql->fetch();
        }

        return $array;
    }
    public function despesaMensalAtual($de, $ate) {
                $sql = "SELECT SUM(despesas.valor) FROM despesas WHERE despesas.data >= '$de' AND despesas.data < '$ate'";
        $sql = $this->db->query($sql);
        
        
        if ($sql->rowCount() > 0) {

            $array = $sql->fetch();
        }

        return $array;
    }

    

    
}


