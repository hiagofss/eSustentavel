<?php require 'templates/header.php'; ?>

<?php
//Verificando se o usuário está logado
if(!(isset($_SESSION['id_usu']))){
    header("Location: login.php");
}
?>

<?php require 'templates/navbar-index.php'; ?>
    <div class="container-fluid">
        <h2>Inserir Dados</h2>
        <?php require 'templates/msgs.php'; ?>

        <input type="text">
        <input type="text">
        <input type="date">

    </div>

<?php require 'templates/footer.php' ?>