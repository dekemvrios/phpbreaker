<?php

namespace Solis\Tools\Trouble;

/**
 * Classe responsável por manipular as operações 
 * envolvidas com o tratamento de exceções
 *  
 */
class TException extends \Exception
{

    /**
     * Constante utilizada para identificar erro causado por sintaxe mal formada no conjunto de parâmetros
     * fornecido pelo usuário
     * 
     */
    const ERR_BAD_REQUEST = 400;

    /**
     * Constante utilizada para identificar erro causado por situação desconhecida que impede a finalização da requisição
     * 
     */
    const ERR_INTERNAL_SERVER_ERROR = 500;

    /**
     * Propriedade contendo as informações relacionadas ao erro que serão exibidas ao usuário
     * 
     * @var string
     */
    private $aInfoErro = [];

    /**
     * Propriedade contendo as informações relacionadas ao erro que serão exibidas em modo de depuração
     * 
     * @var string
     */
    private $aInfoDepuracao = [];

    /**
     * Define se a respectiva classe estara operando em modo de depuracao
     * 
     * @var bool 
     */
    private $bDebugMode;

    /**
     * Define se o retorno da função será no formato JSON
     * 
     * @var bool
     */
    private $bReturnAsJson;

    /**
     * Define se a respectiva classe deverá manter apenas a ultima entrada da pilha de erros
     * 
     * @var bool
     */
    private $bKeepLastTrace;

    /**
     * Método construtor da classe manipulando as exceções lançadas no processo
     * de construção do XML NFe
     * 
     * @param string $sApp Representa o app responsável pelo lançamento da exceção
     * @param string $sOrigem Representa o método qual foi lançada a exceção
     * @param string $sMotivo Representa o motivo pelo qual foi lançada a exceção
     * @param int $iTipo Representa o tipo de exceção que esta sendo lançada       
     */
    public function __construct($sApp, $sOrigem, $sMotivo, $iTipo)
    {
        // é necessário chamar o construtor da classe parent para o correto funcionamento da classe
        parent::__construct('');

        // especifica como não modo de depuração
        $this->setDebugMode(false);

        // mostrará todas as entradas da pilha
        $this->setKeepLastTrace(false);

        // retorno em formato de array
        $this->setReturnAsJson(false);

        // atribui array com a informação de classe
        $this->addInfoDepuracao("classe", $sApp);

        // atribui array com a informação de método
        $this->addInfoDepuracao("metodo", $sOrigem);

        // captura o Trace do erro e o atribui ao array de depuração caso não estiver vazio
        $aTrace = $this->getPrettyTrace();
        if (!empty($aTrace)) {
            $this->addInfoDepuracao("trace", $aTrace);
        }

        // atribui status código de erro com base nas constantes da respectiva classe
        $this->addInfoErro("status", $iTipo);

        // atribui mensagem de erro a ser exibida
        $this->addInfoErro("mensagem", $sMotivo);
    }

    /**
     * Define se a respectiva classe será lançada em modo de depuração
     * 
     * @param bool $bMode Valor lógico utilizado para definir o modo de depuração
     */
    public function setDebugMode($bMode)
    {
        $this->bDebugMode = $bMode;
    }

    /**
     * Retorna o estado atribuido ao modo de depuração da respectiva classe
     * 
     * @return bool Retorna <b>TRUE</b> caso em modo de depuração, <b>FALSE</b> do contrário
     */
    public function hasDebugMode()
    {
        return $this->bDebugMode;
    }

    /**
     * Define se o retorno da respectiva classe será formatado em JSON
     * 
     * @param bool $bReturnAsJson Valor lógico utilizado para definir se o retorno será em JSON
     */
    public function setReturnAsJson($bReturnAsJson)
    {
        $this->bReturnAsJson = $bReturnAsJson;
    }

    /**
     * Retorna o estado atribuido a definição de retorno como JSON do resultado da respectiva classe
     * 
     * @return bool Retorna <b>TRUE</b> caso retornar JSON, <b>FALSE</b> do contrário
     */
    public function hasReturnAsJson()
    {
        return $this->bReturnAsJson;
    }

    /**
     * Define se a respectiva classe deverá manter apenas a ultima entrada da pilha
     * 
     * @param bool $bKeepLastTrace Valor lógico utilizado para definir se será mantido apenas a ultima entrada da pilha
     */
    public function setKeepLastTrace($bKeepLastTrace)
    {
        $this->bKeepLastTrace = $bKeepLastTrace;
    }

    /**
     * Retorna o estado atribuido a definição de manter apenas ultima entrada da pilha
     * 
     * @return bool Retorna <b>TRUE</b> caso manter somente ultima entrada, <b>FALSE</b> do contrário
     */
    public function hasKeepLastTrace()
    {
        return $this->bKeepLastTrace;
    }

    /**
     * Método responsável por adicionar uma propriedade e respectivo valor no 
     * conjunto de informações de usuário tratados pela Exceção
     * 
     * @param string $sProp Representando a propriedade que será atribuida ao conjunto 
     * @param mixed $sValue Representando o elemento que será atribuido a propriedade
     */
    private function addInfoErro($sProp, $sValue)
    {
        if (!empty($sValue)) {
            $this->aInfoErro[$sProp] = $sValue;
        }
    }

    /**
     * Método responsável por retornar as informações associadas ao error lançado. Retorna
     * <b>FALSE</b> caso não houver nenhuma informação associada ao erro
     *      
     * @return mixed
     */
    private function getInfoErro()
    {
        if (!empty($this->aInfoErro)) {
            return $this->aInfoErro;
        }

        return false;
    }

    /**
     * Método responsável por adicionar uma propriedade e respectivo valor no 
     * conjunto de informações de depuração tratados pela Exceção
     * 
     * @param string $sProp Representando a propriedade que será atribuida ao conjunto 
     * @param mixed $sValue Representando o elemento que será atribuido a propriedade     
     */
    private function addInfoDepuracao($sProp, $sValue)
    {
        if (!empty($sValue)) {
            $this->aInfoDepuracao[$sProp] = $sValue;
        }
    }

    /**
     * Método responsável por retornar as informações de depuração associadas ao error lançado. Retorna
     * <b>FALSE</b> caso não houver nenhuma informação associada ao erro
     *      
     * @return mixed     
     */
    private function getInfoDepuracao()
    {
        if (!empty($this->aInfoDepuracao)) {
            return $this->aInfoDepuracao;
        }

        return false;
    }

    /**
     * Método responsável por retornar as informações      
     *      
     * @return mixed     
     */
    public function getExceptionInfo()
    {
        $aRetorno = [];

        // informações de erro são retornadas por padrão
        $aErro = $this->getInfoErro();
        if (!empty($aErro)) {
            // atribui indice que conterá informações de erro
            $aRetorno["erro"] = $aErro;
        }

        // verifica se exceção lançada em modo de depuração
        if (!empty($this->hasDebugMode())) {

            // captura informações de depuração para exibição
            $aDepuracao = $this->getInfoDepuracao();
            if (!empty($aDepuracao)) {
                $aInfoDepuracao = $aDepuracao;

                // caso em modo debug e definido para manter somente a última informação da pilha
                if (!empty($this->hasKeepLastTrace()) && !empty($aInfoDepuracao["trace"])) {
                    // captura o indice que contém a pilha de execução
                    $aTrace = $aInfoDepuracao["trace"];

                    // considera apenas a primeira entrada, representado o ponto de origem da exceção
                    $aInfoDepuracao["trace"] = $aTrace[0];
                }

                // atribui indice que conterá informações de depuração
                $aRetorno["debug"] = $aInfoDepuracao;
            }
        }

        if (!empty($this->hasReturnAsJson())) {
            return json_encode($aRetorno, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        return $aRetorno;
    }

    /**
     * Método responsável por retornar o stack trace da exceção de forma limpa 
     * de modo a facilitar o procedimento de manutenção do código
     * 
     * @return array $aPrettyTrace Contendo os elementos indicando o trace até o momento do lançamento da exceção     
     */
    private function getPrettyTrace()
    {
        // captura a informação completa do trace lançada pela exceção
        $aUglyTrace = $this->getTrace();

        if (!empty($aUglyTrace)) {
            $aPrettyTrace = [];

            // formata a exceção de modo a manter somente os elementos relevantes para o procedimento de debug
            foreach ($aUglyTrace as $aTrace) {
                $aPrettyTraceItem = [];

                if (!empty($aTrace["function"])) {
                    $aPrettyTraceItem["function"] = $aTrace["function"];
                }

                if (!empty($aTrace["file"])) {
                    $aPrettyTraceItem["file"] = $aTrace["file"];
                }

                if (!empty($aTrace["line"])) {
                    $aPrettyTraceItem["line"] = $aTrace["line"];
                }

                if (!empty($aPrettyTraceItem)) {
                    $aPrettyTrace[] = $aPrettyTraceItem;
                }
            }

            if (!empty($aPrettyTrace)) {
                return $aPrettyTrace;
            }
        }
        return false;
    }

}
