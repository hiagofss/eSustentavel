<?php require 'templates/header.php'; ?>

<?php
//Verificando se o usuário está logado
if(!(isset($_SESSION['id_usu']))){
    header("Location: login.php");
}
?>

<?php require 'templates/navbar-index.php'; ?>
    <div class="container-fluid">
        <h2>Controle de Residuos</h2>
        <?php require 'templates/msgs.php'; ?>

        <table class="table">

            <thead>
            <tr>
                <th>ID</th>
                <th>Nome da empresa que fornece</th>
                <th>Data de leitura</th>
                <th>m³ de agua</th>
                <th>Valor</th>
            </tr>
            </thead>

            <tbody>


            <?php
            require 'php/ControleAgua.php';

            @$arrayAgua = listarAgua();

            foreach($arrayAgua as $values){
                ?>
                <tr>
                    <td><?= $values['id_agua']?></td>
                    <td><?= $values['nm_empresa_agua']?></td>
                    <td><?= $values['data_leitura']?></td>
                    <td><?= $values['m3_agua']?></td>
                    <td><?= $values['vl_agua']?></td>
                </tr>
            <?php } ?>
            </tbody>

            <tfoot>
            <tr align="center">
                <td colspan="7" align="center"><a href="#" data-toggle="modal" data-target="#myModal">Adicionar consumo</a></td>
            </tr>
            </tfoot>
        </table>
    </div>

<!-- Modal de cadastro -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastro de Residuos</h4>
            </div>
            <div class="modal-body">

                <?php if(isset($_SESSION['msgErroCad'])){ ?>

                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['msgErroCad']; ?>
                        <?php unset($_SESSION['msgErroCad']) ?>
                    </div>

                <?php } ?>

                <form action="php/Funcoes.php" method="POST">

                    <div class="form-group">
                        <label for="nome">Nome da empresa</label>
                        <input type="text" class="form-control" name="inpNome" id="nome" required>
                    </div>

                    <div class="form-group">
                        <label for="data">Data de leitura</label>
                        <input type="date" class="form-control" name="inpData" id="data" required>
                    </div>

                    <div class="form-group">
                        <label for="metragem">M³ de Agua</label>
                        <input type="text" class="form-control" name="inpMetragem" id="metragem" required>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" class="form-control" name="inpValor" id="valor" required>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="acao" value="cadastrarAgua">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- Fim modal -->

<?php require 'templates/footer.php' ?>
