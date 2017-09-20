<?php

/**
 * Breaker Exception Interface.
 *
 * All exceptions of this package implement this base interface, and extend one of the SPL extensions.
 *
 * @package   Solis\Breaker\Exceptions
 * @author    Rafael Becker <rafael@beecker.com.br>
 * @license   MIT
 * @link      https://github.com/rafaelbeecker/phpbreaker
 * @copyright 2017 Rafael Becker
 */
namespace Solis\Breaker\Exceptions;

use Solis\Breaker\Helpful\AbstractDataContainer;

/**
 * Interface ExceptionInterface.
 *
 * @since   2.0.0
 *
 * @package Solis\Breaker\Exceptions
 * @author  Rafael Becker <rafael@beecker.com.br>
 */
interface ExceptionInterface extends \Throwable
{

    /**
     * Retorna a mensagem de erro atribuída a exception
     *
     * @return string
     */
    public function getErrorMessage(): string;

    /**
     * Retorno o código de erro atribuido a exception.
     *
     * @return int
     */
    public function getErrorCode(): int;

    /**
     * Retorna o nome da class dentro da qual a exception foi lançada.
     *
     * @return string
     */
    public function getClassName(): string;

    /**
     * Retorna o nome do método dentro do qual a exception foi lançada.
     *
     * @return string
     */
    public function getMethodName(): string;

    /**
     * Retorna a relação de argumentos fornecidos ao método dentro do qual a exception foi lançada.
     *
     * @return array
     */
    public function getMethodArgs(): array;

    /**
     * Retorna o AbstractDataContainer qual representa as informações de erro da exception
     *
     * @return AbstractDataContainer
     */
    public function getError(): AbstractDataContainer;

    /**
     * Atribui o AbstractDataContainer qual representa as informações de erro da exception
     *
     * @param AbstractDataContainer $error
     */
    public function setError(AbstractDataContainer $error);

    /**
     * Retorna o AbstractDataContainer qual representa as informações de debug da exception
     *
     * @return AbstractDataContainer
     */
    public function getDebug(): AbstractDataContainer;

    /**
     * Atribui o AbstractDataContainer qual representa as informações de debug da exception
     *
     * @param AbstractDataContainer $debug
     */
    public function setDebug(AbstractDataContainer $debug);

    /**
     * Retorna os dados compilados em error e debug da exception como array associativo
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Retorna os dados compilados em error e debug da exception como string json
     *
     * @return string
     */
    public function toJson(): string;

    /**
     * Retorna os dados compilados em error da exception como string json
     *
     * @return string
     */
    public function getErrorAsJson() : string;

    /**
     * Retorna os dados compilados de depuração da exception como string json
     *
     * @return string
     */
    public function getDebugAsJson() : string;
}
