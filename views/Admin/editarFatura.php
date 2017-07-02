<html>
    <head>
        <script src="../../assets/js/mascaraDeMoeda.js">
        </script>
        <style>
            label {width: 150px; height: 30px; line-height: 30px; float: left; text-align: right; margin-right: 10px;}
            input {width: calc(100% - 200px); height: 30px; padding: 2px; float: left;}
            select {height: 30px; display: block;}
            input[type="submit"] {width: 100%;}
            .ativo {background-color: #00CC00;}
            .msg{width: 100%; color: #006600; text-align: center;}
        </style>
    </head>
    <body>
        <form method="POST">
            <label>Data de Vencimento:</label><input type="date" name="data" value="<?=$pagamento['data'];?>"/>
           
    
            <label>Condição:</label>
            <select name="condicao">
                <option value="<?=$pagamento['condicao'];?>" class="ativo"><?php
        if($pagamento['condicao'] == 0) {
            echo "Não Paga";
        } else {
            echo "Paga";
        }
        
        ?></option>
        <option value="0">Não Paga</option>
        <option value="1">Paga</option>
    </select>

    <?php
        $valor = explode(".", $pagamento['valor']);
    
        if(isset($valor[1])) {
            $valor = $valor[0].",".$valor[1];
        } else {
            $valor = $valor[0];
        }
    ?>
    <label>Valor:</label><input type="text" name="valor" value="<?=$valor;?>" onKeyPress="return(MascaraMoeda(this,'.',',',event))"/><br/>
    <input type="submit" name="atualizar" value="Atualizar"/>
</form>
        <label class="msg">
            <?php
                if(isset($msg)) {
                    echo $msg;
                }
            ?>
        </label>
    </body>
    
</html>

