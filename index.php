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

	<table class="table">

		<thead>
			<tr>
				<th>teste</th>
				<th>teste</th>
				<th>teste</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>Teste</td>
				<td>Teste</td>
				<td>Teste</td>
			</tr>
        </tbody>

	</table>
</div>

<?php require 'templates/footer.php' ?>