<html>
    <head>
        <script type="text/javascript" src="../../assets/js/googleGraficos.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Mensalidades Pagas', <?=$qtdMensalidadesPagas[0];?>],
          ['Mensalidades Ainda não Pagas', <?=$qtdMensalidadesNPagas[0];?>]
        ]);

        var options = {
          title: 'Mensalidades'
        };

        var chart = new google.visualization.PieChart(document.getElementById('mensalidades'));

        chart.draw(data, options);
      }
    </script>
   <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Item", "Valor", { role: "style" } ],
        ["Valor Atual", <?=(int)$receitaMensalAtual[0];?>, "color: #330033"],
        ["Valor Restante", <?=(int)$valorEsperadaMensal[0] - $receitaMensalAtual[0];?>, "color: #003333"],
        ["Valor Esperado", <?=(int)$valorEsperadaMensal[0];?>, "color: #000033"]
      ]);
      
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Receita Mensal",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
    </head>
    <body>
        <table width="100%" style="text-align: center;">
    <tr>
        <td>
            <form method="POST">
                <select name="data">
                    <option value="">Escolha um mês</option>
                    
                    <option value="2017-01-01/2017-02-01">Janeiro 2017</option>
                    <option value="2017-02-01/2017-03-01">Fevereiro 2017</option>
                    <option value="2017-03-01/2017-04-01">Março 2017</option>
                    <option value="2017-04-01/2017-05-01">Abril 2017</option>
                    <option value="2017-05-01/2017-06-01">Maio 2017</option>
                    <option value="2017-06-01/2017-07-01">Junho 2017</option>
                    <option value="2017-07-01/2017-08-01">Julho 2017</option>
                    <option value="2017-08-01/2017-09-01">Agosto 2017</option>
                    <option value="2017-09-01/2017-10-01">Setembro 2017</option>
                    <option value="2017-10-01/2017-11-01">Outubro 2017</option>
                    <option value="2017-11-01/2017-12-01">Novembro 2017</option>
                    <option value="2017-12-01/2018-01-01">Dezembro 2017</option>
                    
                    <option value="2018-01-01/2018-02-01">Janeiro 2018</option>
                    <option value="2018-02-01/2018-03-01">Fevereiro 2018</option>
                    <option value="2018-03-01/2018-04-01">Março 2018</option>
                    <option value="2018-04-01/2018-05-01">Abril 2018</option>
                    <option value="2018-05-01/2018-06-01">Maio 2018</option>
                    <option value="2018-06-01/2018-07-01">Junho 2018</option>
                    <option value="2018-07-01/2018-08-01">Julho 2018</option>
                    <option value="2018-08-01/2018-09-01">Agosto 2018</option>
                    <option value="2018-09-01/2018-10-01">Setembro 2018</option>
                    <option value="2018-10-01/2018-11-01">Outubro 2018</option>
                    <option value="2018-11-01/2018-12-01">Novembro 2018</option>
                    <option value="2018-12-01/2019-01-01">Dezembro 2018</option>
                </select>
                <input type="submit" value="Consultar"/>
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            $de = explode("-", $de_Ate[0]);
            $de = $de[2]."/".$de[1]."/".$de[0];
            
            $ate = explode("-", $de_Ate[1]);
            $ate = $ate[2]."/".$ate[1]."/".$ate[0];
            ?>
            De: <?=$de?> Ate: <?=$ate;?></td>
    </tr>
</table>

<table width="100%" style="text-align: center;">
    <tr>
        <td width="50%">Mensalidades pagas no mês: </td>
        <td width="50%"><?=($qtdMensalidadesPagas[0]);?></td>
    </tr>
    <tr>
        <td width="50%">Mensalidades ainda não pagas no mês: </td>
        <td width="50%"><?=($qtdMensalidadesNPagas[0]);?></td>
    </tr>
    <tr>
        <td width="50%">Mensalidades atrasadas no mês: </td>
        <td width="50%"><?=($qtdMensalidadesAtrasadas[0]);?></td>
    </tr>
    <tr>
        <td width="50%">Total de mensalidades no mês: </td>
        <td width="50%"><?=($qtdMensalidades[0]);?></td>
    </tr>
    <tr>
        <?php
            $valorEsperadaMensal = number_format($valorEsperadaMensal[0] , 2, ',', '.');?>
       
        <td width="50%">Valor esperado mensal: </td>
        <td width="50%"><?=($valorEsperadaMensal);?></td>
    </tr>
    <tr>
        <td width="50%">Receita mensal Atual: </td>
        <?php
            $receitaMensalAtual = number_format($receitaMensalAtual[0] , 2, ',', '.');?>
        
        <td width="50%"><?=($receitaMensalAtual);?></td>
    </tr>
</table>
        <div id="mensalidades" style="width: 100%;"></div>
        <div style="clear: both"></div>
        <Div id="columnchart_values" style="margin: 0 auto; min-height: 300px;"> </div>
    </body>
</html>
