<table  cellspacing=0 cellpadding=0 width='100%'  style="text-align: center;">
    <tbody style="background-color: #EEE;">
    <td>Tipo</td>
    <td>Data</td>
    <td>Condição</td>
    <td>Valor</td>
    <td>Ação</td>
    </tbody>
<?php foreach ($pagamentos as $pagamento ) : ?>

    <tr>
        
        <td><?=$pagamento['tipo'];?></td>
        <td><?=$pagamento['data'];?></td>
        <td><?=$pagamento['condicao'];?></td>
        <td><?=$pagamento['valor'];?></td>
        <td><a href="../editarFatura/<?=$pagamento['id_pagamento'];?>">Editar</a></td>

    </tr>

        
        
    <?php endforeach; ?>
</table>
