
<html>
    <head>
        <link href="<?= BASE_URL; ?>/assets/css/template.css" rel="stylesheet" />
        
    <title>BoboEsporte</title>
    </head>
    <body>
        <div class="cabecalhoT">
            <div class="cabecalho">
                <div class="menu">

                        </div>
            </div>
                       
                    
                    
   
        <div class="container">
       
        <?php
        $this->loadViewInTemplate($viewName, $viewData);
        ?>
             </div>
        <div style="clear: both"></div>
        <div class="rodapeT">
            <div class="rodape">
                
            </div>
        </div>
    </body>
</html>