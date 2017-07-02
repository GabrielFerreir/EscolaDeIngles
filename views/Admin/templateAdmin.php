<html>
    <head>

        <style>
            * { margin: 0; padding: 0;}
            .cabecalho {width: 1024px; height: 70px; background-color: #111; margin: 0 auto; line-height: 70px; color: #EAEAEA; display: block;}
            .cabecalho h1{font-size: 18px; font-style: normal; margin-left: 50px; float: left;}
            .cabecalho .menu {width: 100%; height: 40px; background-color: #EEE;}
            .menu li {float: left; width: 180px; line-height: 40px; text-align: center;}
            .conteiner {width: 1024px; min-height: 300px; margin: 0 auto; display: block;}
        </style>
        
    </head>
    <body>
        <div class="cabecalho">
            <h1>Escola De Inglês</h1><br>
            <div class="menu">
            <ul>
              
                <li><a href="<?=BASE_URL;?>/admin/home/">Home</a></li>
                <li><a href="<?=BASE_URL;?>/admin/inserirAluno/">Inserir aluno</a></li>
                <li><a href="<?=BASE_URL;?>/admin/listaAlunos/">Alunos</a></li>
                <li><a href="<?=BASE_URL;?>/admin/mensalidadesAtrasadas/">Mensalidades Atrasadas</a></li>
                <li><a href="<?=BASE_URL;?>/admin/relatoriosMensais/">Relatorio Mensal</a></li>
                
               
            </ul>
        </div>
        </div>
        <div style="clear: both;"></div>
        
        <div class="conteiner">
            <?php
        $this->loadViewInTemplate($viewName, $viewData);
        ?>
        </div>
        
        
    </body>
</html>
        