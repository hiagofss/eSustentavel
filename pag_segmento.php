<?php
/**
 * Created by PhpStorm.
 * User: hiago
 * Date: 06/10/2018
 * Time: 17:13
 */

?>

<?php require 'templates/header.php'; ?>

<?php
//Verificando se o usuário está logado
if(!(isset($_SESSION['id_usu']))){
    header("Location: login.php");
}
?>

<?php require 'templates/navbar-index.php'; ?>
<div class="container-fluid">
    <h2>Segmentos</h2>
    <?php require 'templates/msgs.php'; ?>

    <table class="table">

        <thead>
        <tr>
            <th>ID</th>
            <th>Segmento</th>
        </tr>
        </thead>

        <tbody>


        <?php
        require 'php/Segmento.php';

        @$segmento = listarSegmento();

        foreach($segmento as $values){
            ?>
            <tr>
                <td><?= $values['id_segm']?></td>
                <td><?= $values['nm_segm']?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr align="center">
            <td colspan="7" align="center"><a href="#" data-toggle="modal" data-target="#myModal">Adicionar novo Segmento</a></td>
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
                <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
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
                        <label for="nome">Segmento</label>
                        <input type="text" class="form-control" name="inpSegmento" id="segmento" required>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="acao" value="cadastrarSegmento">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- Fim modal -->

<?php require 'templates/footer.php' ?>

