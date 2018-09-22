<script src="https://use.fontawesome.com/4cbe07834d.js"></script>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">eSustentavel</a>
		</div>
		<ul class="nav navbar-nav">
            <li><a href="pag_relatorio.php">Relatório</a></li>
			<li><a href="pag_insercao.php">Inserir Dados</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<?= $_SESSION['nome'];?><span class="caret"></span></a>

				<ul class="dropdown-menu">
                    <li><a href="php/Funcoes.php?acao=sair"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Sair</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>