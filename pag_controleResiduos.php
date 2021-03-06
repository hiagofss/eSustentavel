<?php require 'templates/header.php'; ?>

<?php
//Verificando se o usuário está logado
if (!(isset($_SESSION['id_usu']))) {
    header("Location: login.php");
}
?>

<link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">


<?php require 'templates/navbar-index.php'; ?>
<div class="container-fluid">
    <h2>Controle de Residuos</h2>
    <?php require 'templates/msgs.php'; ?>

    <table class="table" id="data">

        <thead>
        <tr>
            <th>Nome do Residuo</th>
            <th>Descrição Residuo</th>
            <th>Peso</th>
            <th>Data da Pesagem</th>
            <th>Destino</th>
        </tr>
        </thead>

        <tbody>


        <?php
        require_once 'php/ControleResiduo.php';

        @$residuos = listar();

        foreach ($residuos as $values) {
            ?>
            <tr>
                <td><?= $values['nm_residuo'] ?></td>
                <td><?= $values['desc_residuo'] ?></td>
                <td><?= $values['peso_residuo'] ?></td>
                <td>
                    <?php $date = $values['data_pesagem'];
                    $data = implode("/", array_reverse(explode("-", $date)));
                    echo $data;
                    ?>
                </td>
                <td><?= $values['destino_residuo'] ?></td>
            </tr>
        <?php } ?>
        </tbody>

        <tfoot>
        <tr align="center">
            <td colspan="7" align="center"><a href="#" data-toggle="modal" data-target="#myModal">Adicionar Residuos</a>
            </td>
        </tr>
        </tfoot>
    </table>

    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#data').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)"
                }
            });
        });
    </script>
</div>

<!-- Modal de cadastro -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Cadastro de Residuos</h4>
            </div>
            <div class="modal-body">

                <?php if (isset($_SESSION['msgErroCad'])) { ?>

                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['msgErroCad']; ?>
                        <?php unset($_SESSION['msgErroCad']) ?>
                    </div>

                <?php } ?>

                <form action="php/Funcoes.php" method="POST">

                    <div class="form-group">
                        <label for="nome">Nome do Residuo</label>
                        <input type="text" class="form-control" name="inpNome" id="nome" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo do residuo</label>

                        <select class="form-control" name="inpTipo" id="tipo" required>
                            <option></option>
                            <?php
                            require_once 'php/Residuo.php';

                            @$residuos = listarResiduos();

                            foreach ($residuos as $values) {
                                ?>
                                <option value="<?= $values['id_residuo'] ?>"><?= $values['desc_residuo'] ?></option>
                            <?php } ?>
                        </select>

                        <!--                        <input type="text" class="form-control" name="inpTipo" id="tipo" required>-->


                    </div>

                    <div class="form-group">
                        <label for="perigo">Residuo perigoso</label>
                        <select class="form-control" name="inpPerigo" id="perigo" required>
                            <option></option>
                            <option>Sim</option>
                            <option>Não</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <input type="number" class="form-control" name="inpPeso" id="peso" required>
                    </div>

                    <div class="form-group">
                        <label for="data"> Data da Pesagem</label>
                        <input type="date" class="form-control" name="inpData" id="data" required>
                    </div>

                    <div class="form-group">
                        <label for="destino">Destino</label>
                        <input type="text" class="form-control" name="inpDestino" id="destino" required>
                    </div>

                    <div class="form-group">
                        <label for="reciclavel">Reciclavel</label>
                        <select class="form-control" name="inpReciclavel" id="reciclavel" required>
                            <option></option>
                            <option>Sim</option>
                            <option>Não</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="acao" value="cadastrarRes">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- Fim modal -->

<?php require 'templates/footer.php' ?>
