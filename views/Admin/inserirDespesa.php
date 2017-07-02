<script src="../../assets/js/mascaraDeMoeda.js">

</script>

<form method="POST">
    <label>Nome:</label><input type="text" name="nome" placeholder="Nome"/><br/>
    <label>Data:</label><input type="date" name="data"/><br/>
    <label>Valor:</label><input type="text" name="valor" maxlength="10" placeholder="Valor" onKeyPress="return(MascaraMoeda(this,'.',',',event))"/><br/>
    <input type="submit" name="inserir" value="Inserir"/>
</form>
<?php
    if(isset($msg)) {
        echo $msg;
    }
?>