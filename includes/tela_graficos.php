<?php
if ($obEvento == 0) {
    $obEvento = "0";
}

$data = DateTime::createFromFormat('Ymd', $evento->data);
//$dia = $data->format('D');

?>
<section class="tabs-wrapper">
    <div class="tabs-container" style="padding: 0;">
        <div class="tabs-block">
            <div id="tabs-section" class="tabs">
                <ul class="tab-head">
                    <li>
                        <a href="#tab-1" class="tab-link active"> <i class="fa fa-pie-chart"></i> <span class="tab-label">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#tab-2" class="tab-link"> <i class="fa fa-ticket"></i> <span class="tab-label">Ingressos</span></a>
                    </li>
                    <li>
                        <a href="#tab-3" class="tab-link"> <i class="fa fa-fa fa-bullhorn"></i> <span class="tab-label">Divulgação</span></a>
                    </li>
                    <li>
                        <a href="#tab-4" class="tab-link"> <i class="fa fa-fa fa-chevron-down"></i> <span class="tab-label">Check-in</span></a>
                    </li>
                    <li>
                        <a href="#tab-5" class="tab-link"> <i class="fa fa-money"></i> <span class="tab-label">Financeiro</span></a>
                    </li>
                    <li>
                        <a href="#tab-6" class="tab-link"> <i class="fa fa-file-text"></i> <span class="tab-label">Gerar Relatórios</span></a>
                    </li>
                </ul>

                <section id="tab-1" class="tab-body entry-content active active-content">
                    <h2 style="margin-top: -1%;"><?= $evento->titulo ?></h2>
                    <p style="margin-top: -1.5%;">Data: <? //$dia 
                                                        ?>, <?= $data ?></p>
                    <div id="Home" class="tabcontent">
                        <div class="line first">
                            <div class="blocos corpo1">
                                <h4>INGRESSOS VENDIDOS</h4>
                                <p>Total de ingressos vendidos até o momento atual.</p>
                                <h1 style="text-align: center; font-size: 3.5rem;"></h1>
                                <hr>
                                <div class="contadores-eventos">
                                    <div class="titulos-contadores">
                                        <b>Ingressos pagos: </b>
                                        <b>Ingressos gratuitos: </b>
                                        <b class="total">Total de ingressos: </b>
                                    </div>
                                    <div class="numeros-contadores">
                                        <b><?= $obEvento ?></b>
                                        <b>0</b>
                                        <b class="total"></b>
                                    </div>
                                </div>
                            </div>
                            <div class="blocos corpo2">
                                <h4>INGRESSOS DETALHADOS</h4>
                                <p>Números de todos os ingressos vendidos.</p>

                                <?php
                                if ($obEvento == 0) {
                                    echo "<b>Não há vendas registradas.</b>";
                                } else {
                                    echo '<div id="container" style="width: 100%;margin: 0 auto"></div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="line second">
                            <div class="blocos corpo3">
                                <h4>CANAIS DE VENDAS</h4>
                                <p>Vendas realizadas presencialmente (PDVs) e virtualmente (site).</p>
                                <?php
                                if ($obEvento == 0) {
                                    echo "<b>Não há vendas registradas.</b>";
                                } else {
                                    echo '<div id="resultadosCanais" style="width: 100%;margin: 0 auto"></div>';
                                }
                                ?>
                            </div>
                            <div class="blocos corpo4">
                                <h4>REDES SOCIAIS</h4>
                                <p>Participação de redes sociais em vendas.</p>
                                <div id="resultadosRedes" style="width: 100%;margin: 0 auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="tab-2" class="tab-body entry-content">
                    <h2><?= $evento->titulo ?></h2>
                    <p>Data: <? $dia 
                                ?>, <?= $data ?></p>
                    <div class="divider-2">
                        <div class="blocos b-50 scroll">
                            <h4>Observações no(s) Ingresso(s):</h4>
                            <div class="b-100">
                                <form method="POST">
                                    <?php
                                    foreach ($ingressos as $ingresso) {
                                        //$id = $ingresso['id'];
                                        //$nome_ingresso = $ingresso['nome_ingresso'];
                                        //$idIngresso = $ingresso['id_ingresso'];
                                        //$quantidade = $ingresso['quantidade'];
                                        //$obs_etiqueta = $ingresso['obs_etiqueta'];
                                        $textarea = strlen($ingresso->obs_etiqueta) ? $ingresso->obs_etiqueta : 'Digite informações importantes para os compradores.';
                                        echo "<div class='col-destaque'>" . $ingresso->nome_ingresso . ": </div>";
                                        echo "<textarea name='observacoes[]' id='observacoes[]' cols='30' rows='2' class='form-control'>" . $textarea ."</textarea>";
                                        echo '<input type="text" name="idIngresso[]" id="idIngresso" value="' . $ingresso->id . '" class="form-control" hidden>';
                                    }
                                    ?>
                                    <button type="submit" class="btn btn-primary" id="add_evento_btn">Atualizar observações</button>
                                    <p style="font-size: 12px; font-weight: 600;">As informações inseridas nos campos acima, serão exibidas na sessão "Observações" na impressão do ingresso.</p>
                                </form>
                            </div>
                        </div>
                        <div class="blocos b-50">
                            <h4>Totalizadores:</h4>
                            <p class="resume-dados aprovado"> Ingressos aprovados: <b><?= $obEvento ?></b></p>
                            <p class="resume-dados parados">Ingressos pendentes: <b>0</b></p>
                            <p class="resume-dados cancelados">Ingressos cancelados: <b>0</b></p>
                        </div>
                    </div>

                </section>

                <section id="tab-3" class="tab-body entry-content">
                    <h2>BB Cream</h2>
                    <p>Personally, I prefer BB cream to regular foundation, as I find it to be much more natural-looking. It is a great option if you’re looking for something that has skincare benefits such as moisturizing or priming (some BB creams have primer built in).</p>
                    <p>In addition, if you are new to the makeup world, a good BB cream is an even better place to start than foundation, as it feels lighter on the skin, is hard to overdo, and can be applied with your fingers.</p>
                </section>

                <section id="tab-4" class="tab-body entry-content">
                    <h2>Concealer</h2>
                    <p>If you have acne, dark circles, or any kind of discoloration, concealer is a must-have.</p>
                    <p>Concealers come in full-coverage and sheerer-coverage formulations, and which one you should choose depends on how much you’re trying to cover up.</p>
                    <p>When choosing a concealer for acne and/or discoloration, find a shade that is as close as possible to your foundation/BB cream shade for the most natural look.</p>
                </section>

                <section id="tab-5" class="tab-body entry-content">
                    <h2>Blush</h2>
                    <p>Putting on blush can have a huge effect on your overall look, and I personally never leave it out of my makeup routine. Blush is especially necessary if you’re wearing a foundation with more opaque coverage, which can sometimes leave your complexion looking a little bit flat.</p>
                    <p>Blush comes in powder, gel, and cream formulations, with powder being the most popular. Recently, though, cream and gel blush have become very popular as well.</p>
                </section>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./src/js/app.js"></script>
<script language="JavaScript">
    function drawChart() {
        // Define the chart to be drawn.
        var data = google.visualization.arrayToDataTable([
            ['Ingresso', 'Quantidade'],
            <?php
            foreach ($graficoIngresso as $busca) {
                $id = $busca['id'];
                $nome_ingresso = $busca['nome_ingresso'];
                $idIngresso = $busca['id_ingresso'];
                $quantidade = $busca['quantidade'];

                $grafico = "['" . $nome_ingresso . "', " . $quantidade . "],";
                echo $grafico;
            }
            ?>
        ]);
        var options = {
            title: 'Ingressos (unitário):'
        };
        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart(document.getElementById('container'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart);
</script>
<script language="JavaScript">
    function drawChart() {
        // Define the chart to be drawn.
        var data = google.visualization.arrayToDataTable([
            ['ingresso', 'PDV', 'Site'],
            <?php
            foreach ($graficoIngresso as $busca) {
                $nome_ingresso = $busca['nome_ingresso'];
                $pdv = $busca['pdv'];
                $site = $busca['site'];

                $grafico = "['" . $nome_ingresso . "', " . $pdv . ", " . $site . "],";
                echo $grafico;
            }
            ?>
        ]);
        var options = {
            title: 'Canais de vendas (unitários):'
        };
        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart(document.getElementById('resultadosCanais'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart);
</script>
<script language="JavaScript">
    function drawChart() {
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Redes Sociais: ');
        data.addColumn('number', 'Porcentagem');
        data.addRows([
            ['Instagram', 45.0],
            ['Facebook', 26.8],
            ['Google', 15.4],
            ['Twitter', 12.8]
        ]);
        // Set chart options
        var options = {
            'title': 'Origem dos clientes que compraram.',
            colors: ['#D110B2', '#3b5998', '#EE4435', '#00acee']
        };
        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById('resultadosRedes'));
        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart);
</script>
</div>