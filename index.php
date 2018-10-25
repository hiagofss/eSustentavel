<?php require 'templates/header.php'; ?>

<?php
//Verificando se o usuário está logado
if (!(isset($_SESSION['id_usu']))) {
    header("Location: login.php");
}
?>
<?php require 'templates/msgs.php'; ?>
<?php require 'templates/navbar-index.php'; ?>
    <div class="container-fluid">
        <h2>Dashboard</h2>


    </div>

<?php require 'templates/footer.php' ?>