<html>
    
    <head>
        
        <link href="<?= BASE_URL; ?>/assets/css/admin/inserirAluno.css" rel="stylesheet" />
        <script>
            function seisMeses(){
                document.getElementById("parcelas").innerHTML = "<input type='date' name='P1'/>\n\
                                                                <input type='text' name='P1V' placeholder='R$'/>\n\
                                                                <input type='date' name='P2'/>\n\
                                                                <input type='text' name='P2V' placeholder='R$'/>\n\
                                                                <input type='date' name='P3'/>\n\
                                                                <input type='text' name='P3V' placeholder='R$'/>\n\
                                                                <input type='date' name='P4'/>\n\
                                                                <input type='text' name='P4V' placeholder='R$'/>\n\
                                                                <input type='date' name='P5'/>\n\
                                                                <input type='text' name='P5V' placeholder='R$'/>\n\
                                                                <input type='date' name='P6'/>\n\
                                                                <input type='text' name='P6V' placeholder='R$'/>\n\
                                                                ";
            }
            function dozeMeses(){
                document.getElementById("parcelas").innerHTML = "<input type='date' name='P1'/>\n\
                                                                <input type='text' name='P1V' placeholder='R$'/>\n\
                                                                <input type='date' name='P2'/>\n\
                                                                <input type='text' name='P2V' placeholder='R$'/>\n\
                                                                <input type='date' name='P3'/>\n\
                                                                <input type='text' name='P3V' placeholder='R$'/>\n\
                                                                <input type='date' name='P4'/>\n\
                                                                <input type='text' name='P4V' placeholder='R$'/>\n\
                                                                <input type='date' name='P5'/>\n\
                                                                <input type='text' name='P5V' placeholder='R$'/>\n\
                                                                <input type='date' name='P6'/>\n\
                                                                <input type='text' name='P6V' placeholder='R$'/>\n\
                                                                <input type='date' name='P7'/>\n\
                                                                <input type='text' name='P7V' placeholder='R$'/>\n\
                                                                <input type='date' name='P8'/>\n\
                                                                <input type='text' name='P8V' placeholder='R$'/>\n\
                                                                <input type='date' name='P9'/>\n\
                                                                <input type='text' name='P9V' placeholder='R$'/>\n\
                                                                <input type='date' name='P10'/>\n\
                                                                <input type='text' name='P10V' placeholder='R$'/>\n\
                                                                <input type='date' name='P11'/>\n\
                                                                <input type='text' name='P11V' placeholder='R$'/>\n\
                                                                <input type='date' name='P12'/>\n\
                                                                <input type='text' name='P12V' placeholder='R$'/>\n\
                                                                ";
            }
        </script>

    </head>
    
    <body>



<div>
    <input type="submit" value="6° Meses" onclick="seisMeses()">
    <input type="submit" value="12° Meses" onclick="dozeMeses()">
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome"/><br/>
        <input type="text" name="email" placeholder="Email"/><br/>
        <input type="text" name="endereco" placeholder="Endereço"/><br/>
        <input type="text" name="bairro" placeholder="Bairro"/><br/>
        <input type="text" name="cidade" placeholder="Cidade"/><br/>
        <input type="text" name="estado" placeholder="Estado"/><br/>
        <input type="text" name="cep" placeholder="Cep"/><br/>
        <input type="text" name="cpf" placeholder="CPF"/><br/>
        <input type="text" name="rg" placeholder="RG"/><br/>
        <input type="text" name="orgExp" placeholder="Org. Expedidor"/><br/>
        <input type="date" name="dataNascimento" placeholder="Data de Nascimento"/><br/>
        <input type="text" name="telefone" placeholder="Telefone"/><br/>
        <input type="text" name="celular" placeholder="Celular"/><br/>
        
        <label>Modulo</label>
        <select name="modulo">
            <option value="1° modulo">1° Modulo</option>
            <option value="2° modulo">2° Modulo</option>
            <option value="3° modulo">3° Modulo</option>
            <option value="4° modulo">4° Modulo</option>
            <option value="5° modulo">5° Modulo</option>
            <option value="6° modulo">6° Modulo</option>
            <option value="Conversação">Conversação</option>
        </select>
        
        <br/>
        
        <h4>Parcelas</h4>
        
        <div id="parcelas" style="min-height: 50px;">
            Escolha o tipo de contrato
        </div>
        
        
        
        
        <input type="submit" name="btnCadastrar" value="Cadastrar"/>
    </form>
</div>
        
    </body>
</html>