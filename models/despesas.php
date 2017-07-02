<?php

class Despesas extends model {

    public function inserirDespesa($nome, $data, $valor) {
         
            $sql = "INSERT INTO despesas set nome = '$nome', data = '$data', valor = '$valor'";
            $sql = $this->db->query($sql);

            if($sql == true) {
                return true;
            }
            
        
    }
    

    
}


