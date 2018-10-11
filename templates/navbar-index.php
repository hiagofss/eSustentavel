<script src="https://use.fontawesome.com/4cbe07834d.js"></script>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">eSustentavel</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="pag_controleResiduos.php">Controle de Residuos</a></li>
            <li class="active"><a href="pag_controleAgua.php">Controle de Agua</a></li>
            <li class="active"><a href="pag_controleEnergia.php">Controle de Energia</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<?= $_SESSION['nome'];?><span class="caret"></span></a>

                <ul class="dropdown-menu">
                    <li><a href="pag_empresa.php"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;Gerenciar empresa</a></li>
                    <li><a href="pag_segmento.php"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Gerenciar segmentos</a></li>
                    <li><a href="pag_residuos.php"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Gerenciar Tipo Residuo</a></li>
                    <li><a href="php/Funcoes.php?acao=sair"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Sair</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>