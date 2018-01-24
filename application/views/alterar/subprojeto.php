  <script type="text/javascript">
       function myResult(){
          var vlr =  document.getElementById("jemg").innerHTML;
          if (vlr == 'S'){
            document.getElementById("vlrinscricao").disabled = true;
        }
       }
       
   
       
       
  </script>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <br><br>   
    <legend>

        <div class="row breadcrumb" >
            <div class="col-md-10">
                <b>Alterar SubProjeto</b>
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary" href="<?= base_url() ?>Subprojeto">Voltar</a>
            </div>
        </div>

    </legend>
   
    <div class="row">
        <?php
        if (isset($mensagem)) {
            ?>
            <div class="col-md-4">
                <div class="alert alert-success text-center">
                    SubProjeto Alterado Com Sucesso!
                </div>
            </div>
        <?php }
        ?>
    </div>
    <div class="container">
        <form  method="POST" action="<?= site_url('Subprojeto/altera/' . $subprojeto->idsubprojeto) ?>"> 
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nome">Subprojeto</label>
                        <input type="text" class="form-control" id="nome" name="nome" required="required" value="<?= $subprojeto->subprojeto; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="projeto">Projeto</label>
                        <select id="projeto" class="form-control" name="projeto">
                            <option value="<?php echo $subprojeto->idprojeto ?>"><?php echo $subprojeto->projeto ?></option>   

                            <?php foreach ($projeto->result() as $proj => $pj) {
                                ?>
                                <option value="<?php echo $pj->id ?>"><?php echo $pj->nome ?></option>   

                            <?php } ?>
                        </select>
                        <!--<input type="text" class="form-control" id="cep" placeholder="Password">-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="administrador">Responsavel</label>
                        <select id="administrador" class="form-control" name="administrador">
                            <option value="<?php echo $subprojeto->idcood ?>"><?php echo $subprojeto->coordenador ?></option>   

                            <?php foreach ($responsavel->result() as $resp => $re) {
                                ?>
                                <option value="<?php echo $re->id ?>"><?php echo $re->nome ?></option>   

                            <?php } ?>
                        </select>
                        <!--<input type="text" class="form-control" id="cep" placeholder="Password">-->
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="npes">Nº Pessoas Estimadas</label>
                        <input type="text" class="form-control" id="npes" name="npes" value="<?= $subprojeto->numPes ?>" /> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="dtini">Data Inicial</label>
                        <input type="date" class="form-control" id="dtini" name="dtini" required="required" value="<?= $subprojeto->dataini ?>">
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="form-group">
                        <label for="dtfim">Data Final</label>
                        <input type="date" class="form-control" id="dtfim" name="dtfim" required="required" value="<?= $subprojeto->datafim ?>">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" name="status"> 
                            <option value="<?php echo $subprojeto->status ?>"><?php echo $subprojeto->statusDesc ?></option>   
                            <option value="A">ATIVO</option>
                            <option value="I">INATIVO</option>  

                        </select>
                        <!--<input type="text" class="form-control" id="cep" placeholder="Password">-->
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="jemg">Padrão JEMG?</label>
                        <select id="jemg" class="form-control" name="jemg" onblur='myResult()'>
                              <option value="<?php echo $subprojeto->jemg ?>"><?php echo $subprojeto->jemgDesc ?></option>   
                         
                            <option value="S">SIM</option>
                            <option value="N">NÃO</option>  
                        </select>
                        <!--<input type="text" class="form-control" id="cep" placeholder="Password">-->
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="etapa">Etapa</label>
                        <select id="etapa" class="form-control" name="etapa">
                           <option value="<?php echo $subprojeto->idetapa ?>"><?php echo $subprojeto->etapa ?></option>   
                         
                            <?php foreach ($etapa->result() as $etap => $et) {
                                ?>
                                <option value="<?php echo $et->id ?>"><?php echo $et->nome ?></option>   

                            <?php } ?>
                        </select>
                        <!--<input type="text" class="form-control" id="cep" placeholder="Password">-->
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="modalidade">Modalidade</label>
                        <select id="modalidade" class="form-control" name="modalidade" >
                            <option value="<?php echo $subprojeto->idmodalidade ?>"><?php echo $subprojeto->modalidade ?></option>   
                         
                            <?php foreach ($modalidade->result() as $mod => $m) {
                                ?>
                                <option value="<?php echo $m->idmodalidade ?>"><?php echo $m->nome ?></option>   

                            <?php } ?>
                        </select>
                        <!--<input type="text" class="form-control" id="cep" placeholder="Password">-->
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="atividade">Definir Atividade?</label>
                        <select id="atividade" class="form-control" name="atividade">
                              <option value="<?php echo $subprojeto->permitirAtividade ?>"><?php echo $subprojeto->permitirAtividadeDesc ?></option>   
                         
                            <option value="S">SIM</option>
                            <option value="N">NÃO</option>  
                        </select>
                        <!--<input type="text" class="form-control" id="cep" placeholder="Password">-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="premiacao">Premiação</label>
                        <input type="text" class="form-control" id="premiacao" name="premiacao" value="<?php
                             if ($subprojeto->premiacao=='0'){
                                 echo "";
                             }else {
                                 echo $this->funcoes->dinheiro($subprojeto->premiacao);
                             }
                                      
                                      
                                      
                                      
                                      
                                      ?>" placeholder="Caso houver">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cbr" >Cobrar inscrição?</label>
                        <select id="cbr" class="form-control" name="cbr" title="cobrar inscrição do participante?"  value="<?=$subprojeto->cbr?>">
                          <option value="<?php echo $subprojeto->cbr ?>"><?php echo $subprojeto->cbrDesc ?></option>   
                         
                            <option value="S">SIM</option>
                            <option value="N">NÃO</option>  
                        </select>
                        <!--<input type="text" class="form-control" id="cep" placeholder="Password">-->
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="form-group">
                        <label for="vlrinscricao">Se 'SIM', Quanto?</label>
                        <input type="text" class="form-control" id="vlrinscricao" name="vlrinscricao"  value="<?php 
                        
                             if ($subprojeto->vlrinscricao=='0'){
                                 echo "";
                             }else {
                                 echo $this->funcoes->dinheiro($subprojeto->vlrinscricao);
                             }
                                ?>">
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="resumo">Resumo:</label>
                        <textarea class="form-control" rows="5" id="resumo" name="resumo" placeholder="Resumo do Projeto"><?=$subprojeto->resumo?></textarea>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="resulesp">Resultados Esperados:</label>
                        <textarea class="form-control" rows="5" id="resulesp" name="resulesp"><?php echo $subprojeto->resulEsp?></textarea>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-info" title="Alterar SubProjeto">Alterar</button>
        </form>

    </div>

</div>