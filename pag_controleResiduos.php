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


        <?php


        ?>

        <table class="table">

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
            require 'php/ControleResiduo.php';

            @$residuos = listar();

            foreach($residuos as $values){
                ?>
                <tr>
                    <td><?= $values['nm_residuo']?></td>
                    <td><?= $values['desc_residuo']?></td>
                    <td><?= $values['peso_residuo']?></td>
                    <td><?= $values['data_pesagem']?></td>
                    <td><?= $values['destino_residuo']?></td>
                </tr>
            <?php } ?>
            </tbody>

            <tfoot>
            <tr align="center">
                <td colspan="7" align="center"><a href="#" data-toggle="modal" data-target="#myModal">Adicionar Residuos</a></td>
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
                        <label for="nome">Nome do Residuo</label>
                        <input type="text" class="form-control" name="inpNome" id="nome" >
                    </div>

                    <div class="form-group">
                        <label for="preco">Tipo de residuo</label>
                        <input type="text" class="form-control" name="inpTp" id="tp_residuo" >
                    </div>

                    <div class="form-group">
                        <label for="qtd">Segmento de residuo</label>
                        <input type="text" class="form-control" name="inpSeg" id="seg_residuo">
                    </div>

                    <div class="form-group">
                        <label for="preco">Telefone</label>
                        <input type="phone" class="form-control" name="inpTel" id="telefone" >
                    </div>

                    <div class="form-group">
                        <label for="qtd">E-Mail</label>
                        <input type="email" class="form-control" name="inpEmail" id="email">
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
