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
                <th>Nome do Residuo</th>
                <th>Descrição Residuo</th>
                <th>Peso</th>
                <th>Data da Pesagem</th>
                <th>Destino</th>
            </tr>
            </thead>

            <tbody>


            <?php
            require 'php/Residuo.php';

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
        </table>
    </div>

<?php require 'templates/footer.php' ?>
