<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subprojeto extends MY_ControllerLogado {

    public function index() {
        $this->load->model('subprojeto_model', 'subprojetoM');
        $total_rows = $this->subprojetoM->countAll();
         $config = array(
            "base_url" => base_url('Subprojeto'),
            "total_rows" => $total_rows,
            "per_page" => 10,
            "num_links" => 6,
            "uri_segment" => 2,
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "Anterior",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "Próxima",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );

        $this->pagination->initialize($config);
        
        $dados['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
       // $dados["entidade"] = $this->entidadeM->getEntidade($config['per_page'], $offset);
        $dados["subprojeto"] = $this->subprojetoM->getSubprojeto($config['per_page'], $offset);
       
   
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('listasubprojeto', $dados);
        $this->load->view('includes/footer');
    }

    
     public function pesquisar() {
        $this->load->model('subprojeto_model', 'subprojetoM');
            $pesquisa = $this->input->post('pesquisar');
        $total_rows = $this->subprojetoM->countAllpesquisa($pesquisa);
         $config = array(
            "base_url" => base_url('Subprojeto'),
            "total_rows" => $total_rows,
            "per_page" => 10,
            "num_links" => 6,
            "uri_segment" => 2,
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "Anterior",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "Próxima",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );

        $this->pagination->initialize($config);
        
        $dados['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
       // $dados["entidade"] = $this->entidadeM->getEntidade($config['per_page'], $offset);
        $dados["subprojeto"] = $this->subprojetoM->getSubprojetolike($config['per_page'], $offset,$pesquisa);
       
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('listasubprojeto', $dados);
        $this->load->view('includes/footer');
    }
    
    
    public function cadastro() {
//        $this->load->model('tipoentidade_model', 'tipoentidadeM');
        $this->load->model('projeto_model', 'projetoM');
        $this->load->model('profissionaisusuario_model', 'profissionaisusuarioM');
        $this->load->model('modalidade_model', 'modalidadeM');
        $this->load->model('etapa_model', 'etapaM');
        
       
//        $dados['tipo'] = $this->tipoentidadeM->getTipoentidade();
//
        $dados['responsavel'] = $this->profissionaisusuarioM->getProfsubproj();
        $dados['projeto'] = $this->projetoM->getProjeto(); //
        $dados['etapa'] = $this->etapaM->getEtapa();
        $dados['modalidade'] = $this->modalidadeM->getlistModalidade();
         
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('adicionar/subprojeto',$dados);
        $this->load->view('includes/footer');
    }
    
     public function alterar($id,$confirma = NULL) {
        $this->load->model('subprojeto_model', 'subprojetoM');
        $this->load->model('projeto_model', 'projetoM');
        $this->load->model('profissionaisusuario_model', 'profissionaisusuarioM');
        $this->load->model('modalidade_model', 'modalidadeM');
        $this->load->model('etapa_model', 'etapaM');
        
        $dados['projeto'] = $this->projetoM->getProjeto();
        $dados['subprojeto'] = $this->subprojetoM->getSubprojetosel($id)->row(); //retorna a unica linha selecionada
        $dados['responsavel'] = $this->profissionaisusuarioM->getProfsubproj();
      
        $dados['etapa'] = $this->etapaM->getEtapa();
        $dados['modalidade'] = $this->modalidadeM->getlistModalidade();
        
        if (!empty($confirma)){
            $dados['mensagem'] = TRUE;
        }
        
        //deve-se carregar o selecionado
  
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('alterar/subprojeto', $dados);
        $this->load->view('includes/footer');
    }

    //operações

    public function inserir() {
      $this->load->model('subprojeto_model', 'subprojetoM');
       
        $nome = $this->input->post('nome');
        $projeto = $this->input->post('projeto');
        $administrador = $this->input->post('administrador');
        $npes =  $this->input->post('npes');
        $dtini = $this->funcoes->inverteData($this->input->post('dtini'));
        $dtfim = $this->funcoes->inverteData($this->input->post('dtfim'));
        $status = $this->input->post('status');
        $jemg = $this->input->post('jemg');
        $etapa = $this->input->post('etapa');
        $modalidade = $this->input->post('modalidade');
        $atividade = $this->input->post('atividade');
        $premiacao = $this->input->post('premiacao');
        $cbr = $this->input->post('cbr');
        $vlrinscricao = $this->input->post('vlrinscricao');
       
        $resumo = $this->input->post('resumo');
        $resulesp = $this->input->post('resulesp');
        $dataAtual = date('Y-m-d');

        $this->subprojetoM->cadastro(['idcoordenador' => $administrador,'idmodalidade' => $modalidade,'idetapa' => $etapa,'projeto_id' => $projeto,'nome' => $nome,'numPes' => $npes,'permitirAtividade' => $atividade,'jemg' => $jemg,'premiacao' => $premiacao,'cbr' => $cbr,'vlrinscricao' => $vlrinscricao,'resumo'=>$resumo,'resulEsp' => $resulesp,'dataini' => $dtini,'datafim' => $dtfim,
            'status' => $status,'dataCad' => $dataAtual]);
        
          redirect('Subprojeto/index');
    }

      public function altera($id) {
        $this->load->model('subprojeto_model', 'subprojetoM');
      
        $nome = $this->input->post('nome');
        $projeto = $this->input->post('projeto');
        $administrador = $this->input->post('administrador');
        $npes =  $this->input->post('npes');
        $dtini = $this->funcoes->inverteData($this->input->post('dtini'));
        $dtfim = $this->funcoes->inverteData($this->input->post('dtfim'));
        $status = $this->input->post('status');
        $jemg = $this->input->post('jemg');
        $etapa = $this->input->post('etapa');
        $modalidade = $this->input->post('modalidade');
        $atividade = $this->input->post('atividade');
        $premiacao = $this->input->post('premiacao');
        $cbr = $this->input->post('cbr');
        $vlrinscricao = $this->funcoes->moeda($this->input->post('vlrinscricao'));
       
        $resumo = $this->input->post('resumo');
        $resulesp = $this->input->post('resulesp');
        $dataAtual = date('Y-m-d');


        $this->subprojetoM->altera($id,['idcoordenador' => $administrador,'idmodalidade' => $modalidade,'idetapa' => $etapa,'projeto_id' => $projeto,'nome' => $nome,'numPes' => $npes,'permitirAtividade' => $atividade,'jemg' => $jemg,'premiacao' => $premiacao,'cbr' => $cbr,'vlrinscricao' => $vlrinscricao,'resumo'=>$resumo,'resulEsp' => $resulesp,'dataini' => $dtini,'datafim' => $dtfim,
            'status' => $status,'dataCad' => $dataAtual]);
        
        
        redirect('Subprojeto/alterar/'.$id.'/1');
    }
    
    public function excluir($id) {
        $this->load->model('projeto_model', 'projetoM');
        $this->projetoM->excluirEntidade($id);
        redirect('Projeto');
    }

}
