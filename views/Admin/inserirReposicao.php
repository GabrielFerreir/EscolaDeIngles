<form method="POST">
    <label for="dataReposicao">Data Reposição: </label><input type="date" name="dataReposicao">
    <label for="dataVencimento">Data Vencimento: </label><input type="date" name="dataVencimento">
    <label for="valor">Valor: </label><input type="number" name="valor">
    <input type="submit" name="inserir" value="Inserir">
</form>
<?php
    if(isset($msg)) {
        echo $msg;;
    }
?>