<html>
    <head>
        <style>
            label {width: 150px; height: 30px; line-height: 30px; text-align: right; float: left;}
            input {width: calc(100% - 160px); height: 30px; padding: 2px; margin-left: 10px; float: left;}
            select {height: 30px; margin-left: 10px; float: left;}
            input[type="submit"] {width: 100%; margin-top: 5px;}
            .msg{width: 100%; color: #006600; text-align: center;}
        </style>
    </head>
    <body>
        <form method="POST">
    <label>Nome</label>
    <input type="text" name="nome" value="<?=$aluno['nome'];?>"/>
    <br/>
    <label>Email</label>
    <input type="email" name="email" value="<?=$aluno['email'];?>"/>
    <br/>
    <label>Endereço</label>
    <input type="text" name="endereco" value="<?=$aluno['endereco'];?>"/>
    <br/>
    <label>Bairro</label>
    <input type="text" name="bairro" value="<?=$aluno['bairro'];?>"/>
    <br/>
    <label>Cidade</label>
    <input type="text" name="cidade" value="<?=$aluno['cidade'];?>"/>
    <br/>
    <label>Estado</label>
    <input type="text" name="estado" value="<?=$aluno['estado'];?>"/>
    <br/>
    <label>CEP</label>
    <input type="text" name="cep" value="<?=$aluno['cep'];?>"/>
    <br/>
    <label>CPF</label>
    <input type="text" name="cpf" value="<?=$aluno['cpf'];?>"/>
    <br/>
    <label>RG</label>
    <input type="text" name="rg" value="<?=$aluno['rg'];?>"/>
    <br/>
    <label>Data de Nascimento</label>
    <input type="date" name="data" value="<?=$aluno['dataNascimento'];?>"/>
    <br/>
    <label>Telefone</label>
    <input type="text" name="telefone" value="<?=$aluno['telefone'];?>"/>
    <br/>
    <label>Celular</label>
    <input type="text" name="celular" value="<?=$aluno['celular'];?>"/>
    <br/>
    <label>Modulo</label>
            
    <select name="modulo">
                <option value="<?=$aluno['modulo']?>"><?=$aluno['modulo']?></option>
            <option value="1° modulo">1° Modulo</option>
            <option value="2° modulo">2° Modulo</option>
            <option value="3° modulo">3° Modulo</option>
            <option value="4° modulo">4° Modulo</option>
            <option value="5° modulo">5° Modulo</option>
            <option value="6° modulo">6° Modulo</option>
            <option value="Conversação">Conversação</option>
        </select>
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

