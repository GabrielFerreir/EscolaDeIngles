<?php
    if($receitaA[0] == NULL) {
        $receitaA[0] = 0;
    }
    if($receitaB[0] == NULL) {
        $receitaB[0] = 0;
    }
    if($receitaC[0] == NULL) {
        $receitaC[0] = 0;
    }
    if($receitaD[0] == NULL) {
        $receitaD[0] = 0;
    }
    if($receitaE[0] == NULL) {
        $receitaE[0] = 0;
    }
    if($receitaF[0] == NULL) {
        $receitaF[0] = 0;
    }
    if($receitaG[0] == NULL) {
        $receitaG[0] = 0;
    }
    if($receitaH[0] == NULL) {
        $receitaH[0] = 0;
    }
    if($receitaI[0] == NULL) {
        $receitaI[0] = 0;
    }
    if($receitaJ[0] == NULL) {
        $receitaJ[0] = 0;
    }
    if($receitaK[0] == NULL) {
        $receitaK[0] = 0;
    }
    if($receitaL[0] == NULL) {
        $receitaL[0] = 0;
    }
    if($receitaM[0] == NULL) {
        $receitaM[0] = 0;
    }
    if($receitaN[0] == NULL) {
        $receitaN[0] = 0;
    }
    if($receitaO[0] == NULL) {
        $receitaO[0] = 0;
    }
    if($receitaP[0] == NULL) {
        $receitaP[0] = 0;
    }
    if($receitaQ[0] == NULL) {
        $receitaQ[0] = 0;
    }
    if($receitaR[0] == NULL) {
        $receitaR[0] = 0;
    }
    if($receitaAtual[0] == NULL) {
        $receitaAtual[0] = 0;
    }
    if($despesaA[0] == NULL) {
        $despesaA[0] = 0;
    }
    if($despesaB[0] == NULL) {
        $despesaB[0] = 0;
    }
    if($despesaC[0] == NULL) {
        $despesaC[0] = 0;
    }
    if($despesaD[0] == NULL) {
        $despesaD[0] = 0;
    }
    if($despesaE[0] == NULL) {
        $despesaE[0] = 0;
    }
    if($despesaF[0] == NULL) {
        $despesaF[0] = 0;
    }
    if($despesaG[0] == NULL) {
        $despesaG[0] = 0;
    }
    if($despesaH[0] == NULL) {
        $despesaH[0] = 0;
    }
    if($despesaI[0] == NULL) {
        $despesaI[0] = 0;
    }
    if($despesaJ[0] == NULL) {
        $despesaJ[0] = 0;
    }
    if($despesaK[0] == NULL) {
        $despesaK[0] = 0;
    }
    if($despesaL[0] == NULL) {
        $despesaL[0] = 0;
    }
    if($despesaM[0] == NULL) {
        $despesaM[0] = 0;
    }
    if($despesaN[0] == NULL) {
        $despesaN[0] = 0;
    }
    if($despesaO[0] == NULL) {
        $despesaO[0] = 0;
    }
    if($despesaP[0] == NULL) {
        $despesaP[0] = 0;
    }
    if($despesaQ[0] == NULL) {
        $despesaQ[0] = 0;
    }
    if($despesaR[0] == NULL) {
        $despesaR[0] = 0;
    }
    if($despesaAtual[0] == NULL) {
        $despesaAtual   [0] = 0;
    }

?>
<html>
    <head>
        <script type="text/javascript" src="../../assets/js/googleGraficos.js"></script>
        <script>
           google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawLogScales);

function drawLogScales() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'X');
      data.addColumn('number', 'Receita');
      data.addColumn('number', 'Despesa');

      data.addRows([

        ["<?=$mesesA[6]."/".$anoA[6];?>", <?=$receitaG[0];?>, <?=$despesaG[0];?>],
        ["<?=$mesesA[7]."/".$anoA[7];?>", <?=$receitaH[0];?>, <?=$despesaH[0];?>],
        ["<?=$mesesA[8]."/".$anoA[8];?>", <?=$receitaI[0];?>, <?=$despesaI[0];?>],
        ["<?=$mesesA[9]."/".$anoA[9];?>", <?=$receitaJ[0];?>, <?=$despesaJ[0];?>],
        ["<?=$mesesA[10]."/".$anoA[10];?>", <?=$receitaK[0];?>, <?=$despesaK[0];?>],
        ["<?=$mesesA[11]."/".$anoA[11];?>", <?=$receitaAtual[0];?>, <?=$despesaAtual[0];?>],
        ["<?=$mesesS[0]."/".$anoS[0];?>", <?=$receitaL[0];?>, <?=$despesaL[0];?>],
        ["<?=$mesesS[1]."/".$anoS[1];?>", <?=$receitaM[0];?>, <?=$despesaM[0];?>],
        ["<?=$mesesS[2]."/".$anoS[2];?>", <?=$receitaN[0];?>, <?=$despesaN[0];?>],
        ["<?=$mesesS[3]."/".$anoS[3];?>", <?=$receitaO[0];?>, <?=$despesaO[0];?>],
        ["<?=$mesesS[4]."/".$anoS[4];?>", <?=$receitaP[0];?>, <?=$despesaP[0];?>],
        ["<?=$mesesS[5]."/".$anoS[5];?>", <?=$receitaQ[0];?>, <?=$despesaQ[0];?>],
        ["<?=$mesesS[6]."/".$anoS[6];?>", <?=$receitaR[0];?>, <?=$despesaR[0];?>],
      ]);

      var options = {
        hAxis: {
          title: 'Mês',
          logScale: false
        },
        vAxis: {
          title: 'Valor',
          logScale: false
        },
        colors: ['#a52714', '#097138']
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
            </script>
    </head>
    <body>
        <div id="chart_div"></div>
    </body>
</html>
