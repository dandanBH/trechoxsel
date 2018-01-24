<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <br><br>
    <legend>

        <div class="row breadcrumb" >

            <div class="col-md-10">
                <b>Manutenção de SubProjetos</b>
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary" href="<?= base_url() ?>Subprojeto/cadastro">Novo SubProjeto</a>
            </div>
        </div>
    </legend>
    <div class="row breadcrumb">
        <form class="navbar-form navbar-left" role="search" method="post" action="<?= site_url('subProjeto/pesquisar') ?>">
            <div class="form-group">
                <input type="text" name="pesquisar" size="80" class="form-control" placeholder="pesquisar por subprojeto,projeto, modalidade">
            </div>
            <button type="submit" class="btn btn-info">Pesquisar</button>
        </form>
    </div>
    
    <div class="contents">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Projeto</th>
                            <th title="Padrao JEMG" width="12%">Padrão JEMG</th>
                            <th>Etapa</th>
                            <th>Responsavel</th>
                            <th>Inicio</th>
                            <th>Termino</th>
                            <!--<th>Numero Pessoas(Estimadas)</th>-->
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subprojeto->result() as $sp) { ?>
                            <tr>
                                <td><?php echo $sp->subprojeto ?></td>
                                <td><?php echo $sp->projeto ?></td> 
                                <td><center><?php echo $sp->jemgDesc?></center></td>
                                <td><?php echo $sp->etapa ?></td>
                                <td><?php echo $sp->coordenador ?></td>
                                <td><?php echo $this->funcoes->Databrasil($sp->dataini) ?></td>
                                <td><?php echo $this->funcoes->Databrasil($sp->datafim) ?></td>
                                <!--<td><center><?php echo $sp->numPes ?></center></td>-->
                               
                              
                                <td><a href="<?=base_url('Subprojeto/alterar/'.$sp->idsubprojeto)?>" class="btn btn-primary btn-sm">Alterar</a></td>
                                <td><a href="" class="btn btn-info btn-sm">Imprimir</a></td>
                                <td><a href="<?=base_url('Subprojeto/excluir/'.$sp->idsubprojeto)?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja Excluir O Projeto?')">Excluir</a></td>                              
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php echo $pagination;?>
            </div>

        
    </div>
</div>
