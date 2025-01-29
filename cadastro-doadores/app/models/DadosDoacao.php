<?php

class DadosDoacao
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $doador_id;

    /**
     * @var static
     */
    public $intervalo_doacao;

    /**
     * @var double
     */
    public $valor_doacao;

    /**
     * @var static
     */
    public $forma_pagamento;

    /**
     * @var string
     */
    public $banco;

    /**
     * @var string
     */
    public $agencia;

    /**
     * @var string
     */
    public $conta;

    /**
     * @var string
     */
    public $bandeira_cartao;

    /**
     * @var string
     */
    public $seis_primeiros_digitos;

    /**
     * @var string
     */
    public $quatros_ultimos_digitos;
}