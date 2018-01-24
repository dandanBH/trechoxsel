<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SECRETARIA DE ESPORTES</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li><a href="#" title="Perfil do Usuario">PERFIL</a></li>
                <li><a href="<?= base_url("Sair") ?>" title="Fazer logout do sistema">SAIR</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Pesquisar...">
            </form>
        </div>
    </div>

</nav>

<link href="<?= base_url('/assets/menu.css') ?>" rel="stylesheet">

<!--<link href="<?= base_url('/assets/c.css') ?>" rel="stylesheet">-->
<link href="<?= base_url('/assets/font-awesome.min.css') ?>" rel="stylesheet">



<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">




 
<?php

$nivel = $this->session->nivel;

switch ($nivel) {
    case 'dr':
        include ('menudiretor.php');
        break;
    case 'sp':
        include ('menuSub.php');
        break;
    case 'op':
        include ('menuOp.php');
        break;
    case 'tr':
        include ('menutreinador.php');
        break;
    case 'pr':
        include ('menuprof.php');
        break;
    default:
        include ('menuadm.php');
}
?>

