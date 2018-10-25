<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
date_default_timezone_set("Brazil/East");

?>


<?php require 'templates/header.php'; ?>

<?php
//Verificando se o usuário está logado
if (!(isset($_SESSION['id_usu']))) {
    header("Location: login.php");
}
?>

<?php require 'templates/navbar-index.php'; ?>
<?php require 'templates/msgs.php'; ?>
    <div class="container-fluid">

        <!--        <h2>Dashboard</h2>-->

        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages': ['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Meses');
                data.addColumn('number', 'R$');
                data.addRows([
                    <?php
                    require_once 'php/ControleAgua.php';
                    $arrayAgua = listarAgua();
                    foreach ($arrayAgua
                    as $values) {
                    ?>
                    ['<?= $values['data_leitura']?>', <?= $values['vl_agua']?>],
                    <?php } ?>
                ]);

                // Set chart options
                var options = {
                    'title': 'Gráfico indicativo referente ao valor da conta de água',
                    'width': 900,
                    'height': 500,
                    'colors': ['#3366CC']
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.AreaChart(document.getElementById('chart_div_agua'));
                chart.draw(data, options);
            }

            google.charts.setOnLoadCallback(drawChart_energia);

            function drawChart_energia() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Meses');
                data.addColumn('number', 'R$');
                data.addRows([
                    <?php
                    require_once 'php/ControleEnergia.php';
                    $arrayEnergia = listarEnergia();
                    foreach ($arrayEnergia
                    as $values) {
                    ?>
                    ['<?= $values['data_leitura']?>', <?= $values['vl_energia']?>],
                    <?php } ?>
                ]);

                // Set chart options
                var options = {
                    'title': 'Gráfico indicativo referente ao valor da conta de energia',
                    'width': 900,
                    'height': 500,
                    'colors': ['#DC3912']
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.AreaChart(document.getElementById('chart_div_energia'));
                chart.draw(data, options);
            }

            google.charts.setOnLoadCallback(drawChart_residuos);

            function drawChart_residuos() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Data Pesagem');
                data.addColumn('number', 'Peso KG');
                data.addRows([
                    <?php
                    require_once 'php/ControleResiduo.php';
                    $arrayRes = listar();
                    foreach ($arrayRes
                    as $values) {
                    ?>
                    ['<?= $values['data_pesagem']?>', <?= $values['peso_residuo']?>],
                    <?php } ?>
                ]);

                // Set chart options
                var options = {
                    'title': 'Gráfico indicativo referente a data de pesagem e peso',
                    'width': 900,
                    'height': 500,
                    'colors': ['#109618']
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.AreaChart(document.getElementById('chart_div_residuos'));
                chart.draw(data, options);
            }
        </script>
        <!--Div that will hold the pie chart-->

        <!--    <div id="chart_div_agua"></div>-->
        <!--    <div id="chart_div_energia"></div>-->
        <!--    <div id="chart_div_residuos"></div>-->

        <div class="table-responsive">
            <table class="table" style="margin-left: auto; margin-right: auto;">
                <tbody>
                <tr>
                    <td>
                        <div id="chart_div_agua"></div>
                    </td>
                    <td>
                        <div id="chart_div_energia"></div>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;
                        <div id="chart_div_residuos"></div>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
<?php require 'templates/footer.php' ?>