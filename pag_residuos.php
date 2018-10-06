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
        </table>
    </div>

<?php require 'templates/footer.php' ?>
