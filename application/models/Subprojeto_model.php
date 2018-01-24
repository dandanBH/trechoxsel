
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subprojeto_model extends CI_Model {

    //date_format(dtInicio,'%d/%m/%Y') as dtInicio

    var $table = "subprojeto";

    function getSubprojeto($limit = null, $offset = null) {

        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        $this->db->select("sp.idsubprojeto, sp.nome subprojeto,(CASE sp.jemg WHEN 'S' THEN 'SIM' WHEN 'N' THEN 'NAO' end) as jemgDesc, md.nome modalidade,md.idmodalidade,ps.nome coordenador, ps.id idcood, sp.status,pj.nome projeto, pj.id idprojeto,sp.dataCad,sp.resumo,sp.resulEsp,sp.numPes,sp.datafim,sp.dataini,sp.idetapa,et.nome etapa");
        $this->db->from('subprojeto as sp', TRUE);
        $this->db->join('projeto pj', ' pj.id = sp.projeto_id');
        $this->db->join('modalidade md ', ' md.idmodalidade = sp.idmodalidade');
        $this->db->join('profissionais_login pl', 'pl.id = sp.idcoordenador');
        $this->db->join('pessoa ps', 'ps.id = pl.idpessoa');
        $this->db->join('etapa et', 'et.id = sp.idetapa');

        $this->db->order_by('sp.idsubprojeto', 'DESC');
        return $this->db->get();
    }

    function countAll() { // retorna o total de registro da tabela
        return $this->db->count_all($this->table);
    }

    function countAllpesquisa($pesquisa) { // retorna o total de registro da tabela
        if (!empty($pesquisa)) {
            $this->db->like('sp.nome', $pesquisa);
        }
        $this->db->from('subprojeto sp');


        return $this->db->count_all_results();
    }

    function getSubprojetosel($id) {
        $this->db->select("sp.idsubprojeto, sp.nome subprojeto, md.nome modalidade,md.idmodalidade,ps.nome coordenador, pl.id idcood,
        sp.status,(CASE sp.status WHEN 'A' THEN 'ATIVO' WHEN 'I' THEN 'INATIVO' end) as statusDesc,
        sp.jemg,(CASE sp.jemg WHEN 'S' THEN 'SIM' WHEN 'N' THEN 'NAO' end) as jemgDesc,
        sp.permitirAtividade,(CASE sp.permitirAtividade WHEN 'S' THEN 'SIM' WHEN 'N' THEN 'NAO' end) as permitirAtividadeDesc,
        sp.cbr,(CASE sp.cbr WHEN 'S' THEN 'SIM' WHEN 'N' THEN 'NAO' end) as cbrDesc,
       
        pj.nome projeto, pj.id idprojeto,sp.dataCad,sp.resumo,sp.resulEsp,sp.numPes,sp.datafim,sp.premiacao,sp.vlrinscricao,
        sp.dataini,sp.idetapa,et.nome etapa");
        $this->db->from('subprojeto as sp', TRUE);
        $this->db->join('projeto pj', ' pj.id = sp.projeto_id');
        $this->db->join('modalidade md ', ' md.idmodalidade = sp.idmodalidade');
        $this->db->join('profissionais_login pl', 'pl.id = sp.idcoordenador');
        $this->db->join('pessoa ps', 'ps.id = pl.idpessoa');
        $this->db->join('etapa et', 'et.id = sp.idetapa');
        $this->db->where('sp.idsubprojeto', $id);
        return $this->db->get('');
    }

    function cadastro($dados) {
        $this->db->insert("subprojeto", $dados);
    }

    function altera($id, $dados) {

        $this->db->where('idsubprojeto', $id);
        $this->db->update('subprojeto', $dados);


        //$this->db->update('entidade', $dados, 'identidade=', $id);
    }

    function excluirEntidade($id) {
        $this->db->where('identidade', $id, FALSE);


        return $this->db->delete('entidade');
    }

    function getSubprojetoevento() {
        $this->db->select("sp.idsubprojeto, sp.nome subprojeto,(CASE sp.jemg WHEN 'S' THEN 'SIM' WHEN 'N' THEN 'NAO' end) as jemgDesc, md.nome modalidade,md.idmodalidade,sp.vlrinscricao,ps.nome coordenador, ps.id idcood, sp.status,pj.nome projeto, pj.id idprojeto,sp.dataCad,sp.resumo,sp.resulEsp,sp.numPes,sp.datafim,sp.dataini,sp.idetapa,et.nome etapa");
        $this->db->from('subprojeto as sp', TRUE);
        $this->db->join('projeto pj', ' pj.id = sp.projeto_id');
        $this->db->join('modalidade md ', ' md.idmodalidade = sp.idmodalidade');
        $this->db->join('profissionais_login pl', 'pl.id = sp.idcoordenador');
        $this->db->join('pessoa ps', 'ps.id = pl.idpessoa');
        $this->db->join('etapa et', 'et.id = sp.idetapa');
        $this->db->where('permitirAtividade = "N" and sp.status="A"');
        $this->db->order_by('sp.idsubprojeto', 'DESC');
        return $this->db->get();
    }

    function getSubprojetoatividade($idcoord = null) {
        $nivel = $this->session->nivel;
        echo $idcoord . "</br>";
        $this->db->select("sp.idsubprojeto, sp.nome subprojeto,(CASE sp.jemg WHEN 'S' THEN 'SIM' WHEN 'N' THEN 'NAO' end) as jemgDesc, md.nome modalidade,md.idmodalidade,sp.vlrinscricao,ps.nome coordenador, ps.id idcood, sp.status,pj.nome projeto, pj.id idprojeto,sp.dataCad,sp.resumo,sp.resulEsp,sp.numPes,sp.datafim,sp.dataini,sp.idetapa,et.nome etapa");
        $this->db->from('subprojeto as sp', TRUE);
        $this->db->join('projeto pj', ' pj.id = sp.projeto_id');
        $this->db->join('modalidade md ', ' md.idmodalidade = sp.idmodalidade');
        $this->db->join('profissionais_login pl', 'pl.id = sp.idcoordenador');
        $this->db->join('pessoa ps', 'ps.id = pl.idpessoa');
        $this->db->join('etapa et', 'et.id = sp.idetapa');
        $this->db->where('permitirAtividade = "S" and sp.status="A" ');
        if ($nivel == "sp") {
            $this->db->where('ps.id', $idcoord);
        }
        $this->db->order_by('sp.idsubprojeto', 'DESC');
        return $this->db->get();
    }

    function getSubprojetodasboard() {
        $nivel = $this->session->nivel;
        $id = $this->session->id;


        $this->db->select("sp.idsubprojeto, sp.nome subprojeto,(CASE sp.jemg WHEN 'S' THEN 'SIM' WHEN 'N' THEN 'NAO' end) as jemgDesc,sp.vlrinscricao, md.nome modalidade,md.idmodalidade,ps.nome coordenador, ps.id idcood, sp.status,pj.nome projeto, pj.id idprojeto,sp.dataCad,sp.resumo,sp.resulEsp,sp.numPes,sp.datafim,sp.dataini,sp.idetapa,et.nome etapa");
        $this->db->from('subprojeto as sp', TRUE);
        $this->db->join('projeto pj', ' pj.id = sp.projeto_id');
        $this->db->join('modalidade md ', ' md.idmodalidade = sp.idmodalidade');
        $this->db->join('profissionais_login pl', 'pl.id = sp.idcoordenador');
        $this->db->join('pessoa ps', 'ps.id = pl.idpessoa');
        $this->db->join('etapa et', 'et.id = sp.idetapa');
        if ($nivel == "sp") {
            $this->db->where('ps.id', $id);
            //echo "entrou aqui";
        }
        // die();
        $this->db->order_by('sp.dataini', 'Asc');

        return $this->db->get();
    }

    function getSubprojetodasboardcont() {
        $nivel = $this->session->nivel;
        $id = $this->session->id;
        $this->db->select("count(sp.idsubprojeto) as contsubprojeto");
        $this->db->from('subprojeto as sp', TRUE);
        $this->db->join('projeto pj', ' pj.id = sp.projeto_id');
        $this->db->join('modalidade md ', ' md.idmodalidade = sp.idmodalidade');
        $this->db->join('profissionais_login pl', 'pl.id = sp.idcoordenador');
        $this->db->join('pessoa ps', 'ps.id = pl.idpessoa');
        $this->db->join('etapa et', 'et.id = sp.idetapa');
        if ($nivel == 'sp') {
            $this->db->where('idcoordenador', $id);
        }

        $this->db->order_by('sp.dataini', 'Asc');

        return $this->db->get()->result_array();
    }

    function getCoordsubproj($idcoord) {
        $this->db->select("pl.id");
        $this->db->from('subprojeto sp', TRUE);
        $this->db->join('profissionais_login pl', 'pl.id = sp.idcoordenador');
        $this->db->where('pl.id', $idcoord);
        return $this->db->get()->result_array();
    }
    
    
    
    
     function getSubprojetolike($limit = null, $offset = null, $pesquisa) {

        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        $this->db->select("sp.idsubprojeto, sp.nome subprojeto,(CASE sp.jemg WHEN 'S' THEN 'SIM' WHEN 'N' THEN 'NAO' end) as jemgDesc, md.nome modalidade,md.idmodalidade,ps.nome coordenador, ps.id idcood, sp.status,pj.nome projeto, pj.id idprojeto,sp.dataCad,sp.resumo,sp.resulEsp,sp.numPes,sp.datafim,sp.dataini,sp.idetapa,et.nome etapa");
        $this->db->from('subprojeto as sp', TRUE);
        $this->db->join('projeto pj', ' pj.id = sp.projeto_id');
        $this->db->join('modalidade md ', ' md.idmodalidade = sp.idmodalidade');
        $this->db->join('profissionais_login pl', 'pl.id = sp.idcoordenador');
        $this->db->join('pessoa ps', 'ps.id = pl.idpessoa');
        $this->db->join('etapa et', 'et.id = sp.idetapa');

       
        if (!empty($pesquisa)) {
            $this->db->like('sp.nome', $pesquisa);
            $this->db->or_like('pj.nome', $pesquisa);
               $this->db->or_like('md.nome', $pesquisa);
            //$this->db->like('ps.cpf', $pesquisa);
        }
        $this->db->order_by('sp.nome', 'ASC');
        return $this->db->get();
    }

}
