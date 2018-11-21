<?php
/**
 * Created by PhpStorm.
 * User: hiago
 * Date: 06/10/2018
 * Time: 17:31
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
        <h2>Catálogo</h2>
        <?php require 'templates/msgs.php'; ?>


        <?php


        ?>

        <table class="table">

            <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Residuo</th>
            </tr>
            </thead>

            <tbody>


            <?php
            require 'php/Residuo.php';

            @$residuos = listarResiduos();

            foreach($residuos as $values){
                ?>
                <tr>
                    <td><?= $values['id_residuo']?></td>
                    <td><?= $values['desc_residuo']?></td>
                </tr>
            <?php } ?>
            </tbody>

            <tfoot>
            <tr align="center">
                <td colspan="7" align="center"><a href="#" data-toggle="modal" data-target="#myModal">Adicionar novo Residuo</a></td>
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
                        <label for="nome">Residuo</label>
                        <input type="text" class="form-control" name="inpResiduo" id="nm_residuo" required>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="acao" value="cadastrarResiduo">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- Fim modal -->

<?php require 'templates/footer.php' ?>
