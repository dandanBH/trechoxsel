<?php

class Funcoes {

    function moeda($get_valor) {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }

    function hora($hora) {
        $timestamp = strtotime($hora);
        return date('H:i', $timestamp);
    }

    function tirarCaracteres($valor) {
        $pontos = array("-", ".", ")", "(", "/");
        $result = str_replace($pontos, "", $valor);
        return $result;
    }

    function inverteData($vlr) {
        return implode("-", array_reverse(explode("/", $vlr)));
    }

    function mask($val, $mask) {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($val[$k]))
                    $maskared .= $val[$k++];
            }
            else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

// leitura das datas automaticamente
    function dataExtenso() {
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        $semana = date('w');
        $cidade = "Santa Luzia";
// configuração mes 

        switch ($mes) {

            case 1: $mes = "Janeiro";
                break;
            case 2: $mes = "Fevereiro";
                break;
            case 3: $mes = "Março";
                break;
            case 4: $mes = "Abril";
                break;
            case 5: $mes = "Maio";
                break;
            case 6: $mes = "Junho";
                break;
            case 7: $mes = "Julho";
                break;
            case 8: $mes = "Agosto";
                break;
            case 9: $mes = "Setembro";
                break;
            case 10: $mes = "Outubro";
                break;
            case 11: $mes = "Novembro";
                break;
            case 12: $mes = "Dezembro";
                break;
        }
// configuração semana 
        switch ($semana) {
            case 0: $semana = "Domingo";
                break;
            case 1: $semana = "Segunda Feira";
                break;
            case 2: $semana = "Terça Feira";
                break;
            case 3: $semana = "Quarta Feira";
                break;
            case 4: $semana = "Quinta Feira";
                break;
            case 5: $semana = "Sexta Feira";
                break;
            case 6: $semana = "Sábado";
                break;
        }
        return ("$cidade, $semana, $dia de $mes de $ano");
    }

    function mes($mes) {
        switch ($mes) {
            case 1: echo $mes = "JANEIRO";
                break;
            case 2: echo $mes = "FEVEREIRO";
                break;
            case 3: echo $mes = "MARÇO";
                break;
            case 4: echo $mes = "ABRIL";
                break;
            case 5:echo $mes = "MAIO";
                break;
            case 6:echo $mes = "JUNHO";
                break;
            case 7:echo $mes = "JULHO";
                break;
            case 8:echo $mes = "AGOSTO";
                break;
            case 9:echo $mes = "SETEMBRO";
                break;
            case 10:echo $mes = "OUTUBRO";
                break;
            case 11:echo $mes = "NOVEMBRO";
                break;
            case 12: echo$mes = "DEZEMBRO";
                break;
        }
    }

    function pre($post) {
        echo "<pre>";
        print_r($post);
        echo "</pre>";
        die();
    }

    function sessao() {
        if (!isset($_SESSION['login']) and ( !isset($_SESSION['senha']))) {
            header("Location: index.php");
        }
    }

    function calc_idade($data_nasc) {
        // Separa em dia, mês e ano
        list($dia, $mes, $ano) = explode('/', $data_nasc);

        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);

        // Depois apenas fazemos o cálculo já citado :)
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        return $idade;
    }

    function validaCPF($cpf = null) {

        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }
        // Elimina possivel mascara
        $cpf = ereg_replace('[^0-9]', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    function valida_cnpj($cnpj) {
        // Deixa o CNPJ com apenas números
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        // Garante que o CNPJ é uma string
        $cnpj = (string) $cnpj;

        // O valor original
        $cnpj_original = $cnpj;

        // Captura os primeiros 12 números do CNPJ
        $primeiros_numeros_cnpj = substr($cnpj, 0, 12);

        if (!function_exists('multiplica_cnpj')) {

            function multiplica_cnpj($cnpj, $posicao = 5) {
                // Variável para o cálculo
                $calculo = 0;

                // Laço para percorrer os item do cnpj
                for ($i = 0; $i < strlen($cnpj); $i++) {
                    // Cálculo mais posição do CNPJ * a posição
                    $calculo = $calculo + ( $cnpj[$i] * $posicao );

                    // Decrementa a posição a cada volta do laço
                    $posicao--;

                    // Se a posição for menor que 2, ela se torna 9
                    if ($posicao < 2) {
                        $posicao = 9;
                    }
                }
                // Retorna o cálculo
                return $calculo;
            }

        }

        // Faz o primeiro cálculo
        $primeiro_calculo = multiplica_cnpj($primeiros_numeros_cnpj);

        // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
        // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
        $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 : 11 - ( $primeiro_calculo % 11 );

        // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
        // Agora temos 13 números aqui
        $primeiros_numeros_cnpj .= $primeiro_digito;

        // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
        $segundo_calculo = multiplica_cnpj($primeiros_numeros_cnpj, 6);
        $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 : 11 - ( $segundo_calculo % 11 );

        // Concatena o segundo dígito ao CNPJ
        $cnpj = $primeiros_numeros_cnpj . $segundo_digito;

        // Verifica se o CNPJ gerado é idêntico ao enviado
        if ($cnpj === $cnpj_original) {
            return true;
        }
    }

    function SomarData($data, $dias, $meses = 0, $ano = 0) {
        //passe a data no formato yyyy-mm-dd
        $data = explode("-", $data);
        $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses, $data[2] + $dias, $data[0] + $ano));
        return $newData;
    }

    function dataBrasil($data) {
        $formatoBrasil = implode('/', array_reverse(explode('-', $data)));
        return $formatoBrasil;
    }

    function busca_cep($cep) {
        $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep=' . urlencode($cep) . '&formato=query_string');
        if (!$resultado) {
            $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";
        }
        parse_str($resultado, $retorno);
        return $retorno;
    }

 

    function dinheiro($num) {
        return 'R$ ' . number_format($num, 2, ',', '.');
    }

    function dataAtual() {
        return date('Y-m-d');
    }

}

?>
