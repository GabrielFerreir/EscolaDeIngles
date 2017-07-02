<html>
    <head>
        <style>
            *{margin: 0; padding: 0;}
            .btn { color: #111; text-decoration: none;}
            
            tr:nth-child(even) {background: #FFF;}
            tr:nth-child(odd) {background: #EAEAEA}
            tr:hover{background-color: #CCC;}
            input {width: 100%; height: 30px; padding: 5px; color: #333; margin: 10px 0;
              -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);

            
            }
            input[type='submit']{display: none;}
        </style>
    </head>
    <body>
        <div>
            <form method="POST">
                <input name="pesquisa" type="text" placeholder="Pesquisar" autofocus=""/>
                <input type="submit"/>
            </form>
        </div>
        <table  cellspacing=0 cellpadding=0 width='100%'  style="text-align: center;">
            <?php foreach ($alunos as $aluno) : ?>
                <tr height='30px'>
                    <td width="33%"><?= $aluno['id']; ?></td>
                    <td width="33%"><?= $aluno['nome']; ?></td>
                    <td width="33%" ><a href="<?=BASE_URL;?>/admin/detalhes/<?=$aluno['id'];?>" class="btn">Mais Informações</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>



