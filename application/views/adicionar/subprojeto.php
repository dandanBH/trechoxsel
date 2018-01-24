<script type="javascript">
   var select = document.getElementById("jemg");
// input
   var select = document.getElementById("atividade")
</script>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <br><br>   
     <legend>

        <div class="row breadcrumb" >

            <div class="col-md-10">
                <b>Cadastro de SubProjeto</b>
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary" href="<?=base_url()?>subprojeto">Voltar</a>
            </div>
        </div>
    </legend>
 
        <div class="container">
        <form  method="POST" action="<?=site_url('subprojeto/inserir') ?>"> 
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nome">SubProjeto</label>
                        <input type="text" class="form-control" id="nome" name="nome" required="required">
                    </div>
                </div>
            </div>
              <div class="row">
                   <div class="col-md-4">
                    <div class="form-group">
                        <label for="projeto">Projeto</label>
                        <select id="projeto" class="form-control" name="projeto">
                            <option value="">---</option>
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
                            <option value="">---</option>
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
                        <input type="text" class="form-control" id="npes" name="npes" required="required">
                    </div>
                </div>
                <div class="col-md-2">
                     <div class="form-group">
                        <label for="dtini">Data Inicial</label>
                        <input type="date" class="form-control" id="dtini" name="dtini" required="required">
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="form-group">
                        <label for="dtfim">Data Final</label>
                        <input type="date" class="form-control" id="dtfim" name="dtfim" required="required">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" name="status"> 
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
                        <label for="jemg">Padrão JE(Jogos Escolares)?</label>
                        <select id="jemg" class="form-control" name="jemg">
                                <option value="">---</option>
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
                                <option value="">---</option>
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
                                <option value="S">---</option>
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
                        <select id="atividade" class="form-control" name="atividade" title="Evento: Nao, Campeonato/escola SIM">
                                <option value="">---</option>
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
                        <input type="text" class="form-control" id="premiacao" name="premiacao" placeholder="Caso houver">
                    </div>
                </div>
               <div class="col-md-2">
                    <div class="form-group">
                        <label for="cbr" >Cobrar inscrição?</label>
                        <select id="cbr" class="form-control" name="cbr" title="cobrar inscrição do participante?">
                                <option value="">---</option>
                                <option value="S">SIM</option>
                                <option value="N">NÃO</option>  
                        </select>
                        <!--<input type="text" class="form-control" id="cep" placeholder="Password">-->
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="form-group">
                        <label for="vlrinscricao">Se 'SIM', Quanto?</label>
                        <input type="text" class="form-control" id="dtfim" name="vlrinscricao">
                    </div>
                </div>
                
               
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="resumo">Resumo:</label>
                        <textarea class="form-control" rows="5" id="resumo" name="resumo" placeholder="Resumo do Projeto"></textarea>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="resulesp">Resultados Esperados:</label>
                        <textarea class="form-control" rows="5" id="resulesp" name="resulesp"></textarea>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-success" title="Cadastrar SubProjeto">Cadastro</button>
     </form>

    </div>

</div>


