<form method="POST">
    <input type="date" name="de"/>
    <input type="date" name="ate"/>
    <input type="submit" name="consultar" value="Consultar"/>
</form>

<br/>
<table border="1" width="100%" style="text-align: center;">
<?php
foreach ($mensalidadesAtrasadas as $mensalidadeAtrasada) : ?>
    <tr>
        <td>
        <?=$mensalidadeAtrasada['nome'];?>
        </td>
    <td>
        Vencida em: 
       <?=$mensalidadeAtrasada['data'];?>
        </td>
        <td>
<a href="<?=BASE_URL;?>/admin/detalhes/<?=$mensalidadeAtrasada['id'];?>">Detalhes do Aluno</a>
</td>
    </tr>
<?php endforeach; ?>
</table>
