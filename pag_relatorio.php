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
        $query = "SELECT `controle_residuos`.`nm_residuo`, `tp_residuos`.`desc_residuo`, `controle_residuos`.`peso_residuo`, `controle_residuos`.`data_pesagem`, `controle_residuos`.`destino_residuo` FROM `controle_residuos`
INNER JOIN `tp_residuos` ON `tp_residuos`.`id_residuo` = `controle_residuos`.`tp_residuo`;";
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
            <tr>
                <td>Teste</td>
                <td>Teste</td>
                <td>Teste</td>
                <td>Teste</td>
                <td>Teste</td>
            </tr>
            </tbody>
        </table>
    </div>

<?php require 'templates/footer.php' ?>