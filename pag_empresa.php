<?php
/**
 * Created by PhpStorm.
 * User: hiago
 * Date: 03/10/2018
 * Time: 22:21
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
    <h2>Cadastrar empresa</h2>
    <?php require 'templates/msgs.php'; ?>

    <table class="table">

        <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Residuo</th>
            <th>Tipo de Residuo</th>
            <th>Segmento de residuo</th>
            <th>Telefone</th>
            <th>E-Mail</th>
        </tr>
        </thead>

        <tbody>


        <?php
        require 'php/Empresa.php';

        @$empresas = listarEmpresa();

        foreach($empresas as $values){
            ?>
            <tr>
                <td><?= $values['id_empresa']?></td>
                <td><?= $values['nm_empresa']?></td>
                <td><?= $values['desc_residuo']?></td>
                <td><?= $values['nm_segm']?></td>
                <td><?= $values['tel_empresa']?></td>
                <td><?= $values['email_empresa']?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
        <tr align="center">
            <td colspan="7" align="center"><a href="#" data-toggle="modal" data-target="#myModal">Adicionar nova empresa</a></td>
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
                        <label for="nome">Nome da empresa</label>
                        <input type="text" class="form-control" name="inpNome" id="nome" >
                    </div>

                    <div class="form-group">
                        <label for="tpResiduo">Tipo de residuo</label>
                        <input type="text" class="form-control" name="inpTp" id="tpResiduo" >
                    </div>

                    <div class="form-group">
                        <label for="segResiduo">Segmento de residuo</label>
                        <input type="text" class="form-control" name="inpSeg" id="segResiduo">
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="phone" class="form-control" name="inpTel" id="telefone" >
                    </div>

                    <div class="form-group">
                        <label for="qtd">E-Mail</label>
                        <input type="email" class="form-control" name="inpEmail" id="email">
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="acao" value="cadastrarEmpresa">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- Fim modal -->

<?php require 'templates/footer.php' ?>

